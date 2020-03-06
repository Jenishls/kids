<?php

namespace App\Http\Controllers\Notes;

use App\User;
use App\Model\File;
use App\Model\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotesController extends Controller
{
    protected $path = 'support.pages.note';


    public function index()
    {
        // dd(auth()->id());  
        $note = Note::where('is_deleted', 0)->orderBy('reminder_date', 'asc')->where('userc_id', auth()->user()->id)->first();
        // dd($note);
        return view(default_template() . '.pages.note.index', compact('note'));
    }

    /**
     * Notes Datatable with search and sorting functions
     *
     * @param Request $request
     * @return data
     */
    public function notesTable(Request $request)
    {
        $page = $request->pagination['page'] ?: 1;
        $perPage = $request->pagination['perpage'] ?: 50;
        $query = Note::where('is_deleted', 0);
        $data = [];
        $sort = '';
        $field = '';
        $find = [];
        $pages = $request->pagination['page'];
        if ($request->input('query')) {
            $search = $request->input('query');
            foreach ($search as $key => $value) {
                $values = explode(',', $value);
                $find['row'] = strtolower($key);
                foreach ($values as $key => $search) {
                    $find['value'][$key] = $search;
                }
            }
        }
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        }
        $notes = $query->when($request->sort, function ($q, $sort) {
            if ($sort['field'] !== 'created_by') {
                return $q->orderBy($sort['field'], $sort['sort']);
            } else {
                return $q;
            }
        })
            ->when($request->query, function ($s_query) use ($find) {
                if (count($find) > 0 && $find['value'] != '' && $find['row'] !== 'title')
                    return $s_query->whereIn($find['row'], $find['value']);
                if (count($find) > 0 && $find['value'] != '' && $find['row'] === 'title')
                    return $s_query->where($find['row'], 'like', '%' . $find['value'][0] . '%');
            })
            ->get();
        $total = count($notes);
        foreach ($notes as $note) {
            $user = User::where('id', $note->userc_id)->first();
            $note->created_by = $user->name;
        }
        if ($request->sort['field'] === 'created_by') {
            $notes->sortBy('created_by');
        }
        $data['meta'] = [
            "page" => $request->pagination["page"],
            "pages" => ceil($total / $perPage),
            "perpage" => $perPage,
            "total" => $total,
            "sort" => $sort,
            "field" => $field,
        ];
        return $data['data'] = $notes;
    }

    /**
     * Check whether note has file
     *
     * @param Note $note
     * @return boolean
     */
    public function hasNotefile($id)
    {
        return File::where([
            "table_name" => "notes",
            "table_id" => $id,
            "type" => "note",
            "is_deleted" => 0
        ])->first();
    }


    /**
     * Create file if request contains file
     *
     * @param filemane $noteFile
     * @param note_id $id
     * @return void
     */
    public function storeNoteFile($noteFile, $id)
    {
        File::create([
            'type' => 'note',
            'table_name' => 'notes',
            'table_id' => $id,
            'file_name' => $noteFile,
            "userc_id" => auth()->id(),
            "created_at" => date('Y-m-d H:i:s'),
        ]);
    }


    /**
     * Update existing file for note
     *
     * @param filename $file
     * @param int $id
     * @return void
     */
    public function updateNoteFile($file, $id)
    {
        $data = [
            "type" => "note",
            "file_name" => $file,
            "userc_id" => auth()->id(),
            "table_name" => "notes",
            "table_id" => $id,
            "useru_id" => auth()->id(),
            "updated_at" => date('Y-m-d H:i:s'),
        ];
        return $file->update($data);
    }
}

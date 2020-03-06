<?php

namespace App\Http\Controllers\Notes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Page;
use App\Repo\Models\NoteRepo;
use App\User;
use App\Model\Note;

class NotesAddController extends NotesController
{
    public function addNoteModal()
    {
        $users = User::where('is_deleted', 0)->get();
        $sections = Page::where('is_deleted', 0)->get();
        return view(default_template() . '.pages.note.modal.add_note_modal', compact('users', 'sections'));
    }


    /**
     * Add new note
     *
     * @param Request $request
     * @param NoteRepo $noteRepo
     * @return response
     */
    public function addNewNote(Request $request, NoteRepo $noteRepo)
    {
        $rules = validation_value('noteCreate');
        $this->validate($request, $rules);

        $full_date = explode('/', $request->start_date);
        $arr = [
            'userc_id' => auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'start_date' => $full_date[0],
            'end_date' => $full_date[1],
        ];
        $req = $request->only(['title', 'priority', 'todo_date', 'reminder_date', 'status', 'description']);
        $add = array_merge($req, $arr);
        $noteRepo->save($add);
        if (request()->has('file')) {
            $note = Note::latest()->first();
            $noteFile = upload_file($request, '/note/files');
            $this->storeNoteFile($noteFile, $note->id);
        }
        if (!$noteRepo) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Added Successfully!']);
    }

    public function changeMemberModal()
    {
        return view(default_template() . '.pages.note.modal.change_member_modal');
    }
}

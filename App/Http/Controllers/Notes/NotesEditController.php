<?php

namespace App\Http\Controllers\Notes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Note;
use App\Repo\Models\NoteRepo;
use App\User;
use App\Model\Page;

class NotesEditController extends NotesController
{

    public function editNoteModal(int $id)
    {
        $users = User::where('is_deleted', 0)->get();
        $sections = Page::where('is_deleted', 0)->get();
        $note = Note::find($id);
        return view(default_template() . '.pages.note.modal.edit_note_modal', compact('note', 'users', 'sections'));
    }
    /**
     * Edit Selected Note
     *
     * @param Request $request
     * @param NoteRepo $noteRepo
     * @param integer $id
     * @return response
     */
    public function editNote(Request $request, NoteRepo $noteRepo, int $id)
    {
        $rules = validation_value('noteUpdate');
        $this->validate($request, $rules);
        $full_date = explode('/', $request->start_date);
        $arr = [
            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
            'start_date' => $full_date[0],
            'end_date' => $full_date[1],
        ];

        $req = $request->only(['title', 'priority', 'todo_date', 'reminder_date', 'status', 'description']);
        $update = array_merge($req, $arr);
        $noteRepo->update($id, $update);
        if (request()->has('file')) {
            if ($hasFile = $this->hasNotefile($id)) {
                $this->updateNoteFile($hasFile, $id);
            } else {
                $noteFile = upload_file($request, '/note/files');
                $this->storeNoteFile($noteFile, $id);
            }
        }
        if (!$noteRepo) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }

    public function deleteNote(NoteRepo $noteRepo, int $id)
    {
        $noteRepo->softDelete($id);
    }
}

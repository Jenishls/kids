<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Note;
use App\Model\Account;
use App\Model\Company;

class AccountNoteController extends Controller
{
    /**
    * Store the Company Notes
    * @param - Current Request Instance
    * @return - Notes template rendered with new datas
    */
    public function store(Request $request, int $id)
    {
        $note= Note::create([
            'title' => $request->title?:'',
            'description' => $request->description,
            'table' => 'companies',
            'table_id' => $id,
            'userc_id' => auth()->user()->id
        ]);
        $company= Company::with('notes')->find($id);
        return view(default_template() . '.pages.account.note.notes_data_template', compact('company'));
    }
    /**
     * Update Company notes
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        $note = Note::find($id);
        $note->update([
            'description' => $request->description,
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
        ]);
        $company= Company::with('notes')->find($note->table_id);
        return view(default_template() . '.pages.account.note.notes_data_template', compact('company'));
    }
    /**
     * Soft Delete Company notes
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function softDelete(int $id)
    {
        $note = Note::find($id);
        $note->update([
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id() ?: 0,
        ]);
        $company= Company::with('notes')->find($note->table_id);
        return view(default_template() . '.pages.account.note.notes_data_template', compact('company'));
    }

}

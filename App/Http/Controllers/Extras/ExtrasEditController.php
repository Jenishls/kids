<?php

namespace App\Http\Controllers\Extras;

use App\Model\ExtraQuestion;
use Illuminate\Http\Request;
use App\Model\ExtrasStreetLevel;
use App\Http\Controllers\Controller;

class ExtrasEditController extends ExtrasController
{
    /**
     * Modal view of edit question
     *
     * @param integer $id
     * @return view
     */
    public function editQuestionModal(int $id)
    {
        $questionSection = ExtraQuestion::find($id);
        // dd($questionSection->id);
        return view(default_template() . '.pages.extras.modal.editExtrasQuestionModal', compact('questionSection'));
    }
    /**
     * Modal view of edit option
     *
     * @param integer $id
     * @return view
     */
    public function editExtrasModal(int $id)
    {
        $location = ExtrasStreetLevel::find($id);
        return view(default_template() . '.pages.extras.modal.editExtrasModal', compact('location'));
    }

    /**
     * Update selected question value
     *
     * @param integer $id
     * @param Request $request
     * @return void
     */
    public function updateQuestion(int $id, Request $request)
    {
        $request->validate([
            'question' => 'required',
        ]);
        $questionSection = ExtraQuestion::find($id);
        $questionSection->type = $request->type;
        $questionSection->question = $request->question;
        $questionSection->label = $request->label;
        $questionSection->save();
        return $this->index();
    }

    /**
     * Update Extras option data
     * @param int $id
     * @return update data
     */
    public function updateExtras(Request $request, int $id)
    {
        // dd($request->all());
        $request->validate([
            'label' => 'required',
            'price' => 'required|numeric',
            'seq' => 'required|min:1'

        ]);
        $location = ExtrasStreetLevel::find($id);

        $labels = ExtrasStreetLevel::where('question_id', $location->question_id)->get();
        if ($request->is_default === '1') {

            foreach ($labels as $v) {
                $v->is_default = 0;
                $v->save();
            }
        }
        // $exp_arr = explode(':', $request->flight);
        $arr = [
            // 'flight' => $exp_arr[0],
            // 'price' => (float) $exp_arr[1],

            'useru_id' => auth()->id(),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $update = array_merge($req, $arr);
        // dd($update);
        $location->update($update);
        if (!$location) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }
}

<?php

namespace App\Http\Controllers\Extras;

use App\Model\ExtraQuestion;
use Illuminate\Http\Request;
use App\Model\ExtrasStreetLevel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExtrasAddController extends ExtrasController
{
    // modal
    public function addExtrasModal(int $question_id)
    {
        $question = ExtraQuestion::find($question_id);
        $latest = ExtrasStreetLevel::where('question_id', $question_id)->orderBy('seq', 'DESC')->first();
        $seq = 1;
        if ($latest) {
            $seq = $latest->seq + 1;
        }
        return view(default_template() . '.pages.extras.modal.addExtrasModal', compact('question', 'seq'));
    }
    public function addQuestionModal()
    {
        return view(default_template() . '.pages.extras.modal.addExtrasQuestionModal');
    }

    /**
     * Adds new Question
     *
     * @param Request $request
     * @param Question $question
     * @return response
     */
    public function storeQuestion(Request $request, ExtraQuestion $question)
    {
        $request->validate([
            'question' => 'required',

            // 'seq' => 'unique:extra_options'

        ]);
        $arr = [
            'userc_id' => auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $add = array_merge($req, $arr);
        $question->insert($add);
        return $this->index();
    }

    /**
     * Store Extras option data
     * @param Request $request
     * @return new data
     */
    public function storeQuestionOption(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'label.*' => 'required',
            'price.*' => 'required|numeric',
            'seq.*' => 'required|numeric|min:1',
            // 'seq' => 'unique:extra_options'

        ]);

        $default = ExtrasStreetLevel::where('question_id', $request->question_id)->get();
        foreach ($default as $v) {
            $v->is_default = 0;
            $v->save();
        }
        foreach ($request->label as $key => $value) {
            // dd($default);

            $extras = new ExtrasStreetLevel;
            $extras->label = $value;
            // $extras->seq = ((int) $latest->seq) + 1;

            $extras->is_default = $request->is_default[$key];
            $extras->price = $request->price[$key];
            $extras->seq = $request->seq[$key];
            $extras->question_id = $request->question_id;
            // $extras->flight = $arr[0];
            // $extras->price = (float) $arr[1];
            $extras->created_at = date('Y-m-d H:i:s');
            $extras->userc_id = Auth::id();
            $extras->save();
        }

        return response()->json([
            "message" => "Street Level added Successfully."
        ]);
    }
}

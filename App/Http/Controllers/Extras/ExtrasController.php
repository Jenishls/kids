<?php

namespace App\Http\Controllers\Extras;

use Illuminate\Http\Request;
use App\Model\ExtrasStreetLevel;
use App\Http\Controllers\Controller;
use App\Model\ExtraQuestion;
use Illuminate\Support\Facades\Auth;

class ExtrasController extends Controller
{
    protected $path = 'supportNew.pages.extras.';

    /**
     * Content Controller operates in the content table(Model)
     */
    /**
     * Index function returns the main View(table view)
     * @param - NULL
     * @return - index page rendered view.
     */
    public function index()
    {
        $questions = ExtraQuestion::where('is_deleted', 0)->get();
        return view($this->path . 'index', compact('questions'));
    }

    /**
     * Question Table
     * @param $question id
     * @return section of question table
     */
    public function question(int $question_id)
    {
        $questions = ExtraQuestion::find($question_id);
        return response()->json($questions);
    }

    /**
     * list function returns the data to dateTable(JSON)
     * @param - Request object
     * @return - JSON Data(for Datatable)
     */
    public function list(int $question, Request $request)
    {
        $model = ExtrasStreetLevel::where(['question_id' =>  $question, 'is_deleted' => 0]);
        $sort = '';
        $field = '';
        $find = [];
        $pages = $request->pagination['page'];
        if ($request->input('query')) {
            $search = $request->input('query');
            foreach ($search as $key => $value) {
                $find['row'] = $key;
                $find['value'] = $value;
            }
        }
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        }
        $page = $model
            ->when($request->sort, function ($q, $sort) {
                return $q->orderBy($sort['field'], $sort['sort']);
            })
            ->when($request->query, function ($s_query) use ($find) {
                if (count($find) > 0 && $find['value'] != '')
                    return $s_query->where($find['row'], 'like', '%' . $find['value'] . '%');
            })
            ->orderBy('seq', 'ASC')
            ->get();
        return response()->json($page);
    }


    /**
     * Delete EXtras data
     * @param int $id
     * @return delete 
     */
    public function deleteExtras(int $id)
    {

        $extras = ExtrasStreetLevel::find($id);
        $extras->delete();
        $alldata = ExtrasStreetLevel::orderBy('seq', 'ASC')->get();
        $seq = 1;
        foreach ($alldata as $data) {
            $data->seq = $seq;
            $data->save();
            $seq++;
        }
    }

    /**
     * Delete selected question
     *
     * @param integer $id
     * @return void
     */
    public function deleteQuestion(int $id, Request $request)
    {
        $questionSection = ExtraQuestion::find($id);
        // $validation->code = $request->code;
        // $validation->value = $request->value;

        $questionSection->is_deleted = 1;
        $questionSection->deleted_at = date('Y-m-d H:i:s');
        $questionSection->userd_id = auth()->id();
        $questionSection->save();
        return $this->index();
    }
}

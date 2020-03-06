<?php

namespace App\Http\Controllers\Validation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Validation\Validation;
use App\Model\Validation\ValidationSection;

class ValidationController extends Controller
{
    /**
     * Validation View Blade
     *
     * @return view of main index validation blade
     */
    public function index()
    {
        $validationSections = ValidationSection::where('is_deleted', 0)->get();
        return view(default_template() . '.pages.validation.index', compact('validationSections'));
    }
    /**
     * Validation Section Table
     * @param $section
     * @return section of validation table
     */
    public function validations(int $section_id)
    {
        $validationSections = ValidationSection::find($section_id);
        return response()->json($validationSections);
    }
    /**
     * Validation Section(code, value) Table
     * @param $section
     * @return section(code,value) of validation table
     */
    public function validationsTable(int $section, Request $request)
    {
        $validations = Validation::where('section_id', '=', $section)->where('is_deleted', 0);
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
        $page = $validations
            ->when($request->sort, function ($q, $sort) {
                return $q->orderBy($sort['field'], $sort['sort']);
            })
            ->when($request->query, function ($s_query) use ($find) {
                if (count($find) > 0 && $find['value'] != '')
                    return $s_query->where($find['row'], 'like', '%' . $find['value'] . '%');
            })
            ->get();
        return response()->json($page);
    }
}

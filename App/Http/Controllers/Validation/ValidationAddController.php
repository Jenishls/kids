<?php

namespace App\Http\Controllers\Validation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Validation\ValidationSection;
use App\Model\Validation\Validation;
use App\Repo\Models\ValidationRepo;
use App\Repo\Models\ValidationSectionRepo;

class ValidationAddController extends ValidationController
{
    // protected $path = 'support.pages.validation.modal';

    public function addValidationModal(int $section_id)
    {
        $validationSection = ValidationSection::find($section_id);
        return view(default_template() . ".pages.validation.modal.add_validation_modal", compact('validationSection'));
    }
    public function addSectionModal()
    {
        return view(default_template() . '.pages.validation.modal.addModal.add_section_modal');
    }
    /**
     * Adds new Validation section
     *
     * @param Request $request
     * @param ValidationSection $section
     * @return response
     */
    public function addNewSection(Request $request, ValidationSection $section)
    {
        $rules = validation_value('add_section_modal_form');
        $this->validate($request, $rules);
        $arr = [
            'userc_id' => auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $req = $request->except(['_token']);
        $add = array_merge($req, $arr);
        $section->insert($add);
        return $this->index();
    }

    /**
     * Adds new Validation field
     *
     * @param Request $request
     * @param Validation $validation
     * @return response
     */
    public function addNewValidation(Request $request, Validation $section)
    {
        $rules = validation_value('add_validation_form');
        $this->validate($request, $rules);
        // dd($rules);
        $val_section = ValidationSection::where('id', $request->section_id)->first();

        $arr = [
            'userc_id' => auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'section' => $val_section->section,
        ];
        $req = $request->except(['_token']);
        $add = array_merge($req, $arr);
        // dd($add);
        $section->insert($add);
        // if (!$section) :
        //     return response(['message' => 'Something went wrong while updating!']);
        // endif;
        // return response(['message' => 'Added Successfully!']);
        return $section;
    }
}

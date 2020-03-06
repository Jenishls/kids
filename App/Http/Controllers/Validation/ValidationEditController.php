<?php

namespace App\Http\Controllers\Validation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Validation\Validation;
use App\Model\Validation\ValidationSection;


class ValidationEditController extends ValidationController
{
    //edit Modal
    public function editModal(int $id)
    {
        $validation = Validation::find($id);
        return view(default_template() . '.pages.validation.modal.editModal.edit_validation', compact('validation'));
    }
    /**
     * Update selected validation section code value
     *
     * @param integer $id
     * @param Request $request
     * @return void
     */
    public function updateValidation(int $id, Request $request)
    {
        $rules = validation_value('update_validation_form');
        $this->validate($request, $rules);
        $validation = Validation::find($id);
        $validation->code = $request->code;
        $validation->value = $request->value;
        $validation->description = $request->description;
        // dd($validation);
        $validation->save();
        if (!$validation) :
            return response(['message' => 'Something went wrong while updating!']);
        endif;
        return response(['message' => 'Updated Successfully!']);
    }

    /**
     * Modal view of edit section
     *
     * @param integer $id
     * @return view
     */
    public function editSectionModal(int $id)
    {
        $validationSection = ValidationSection::find($id);
        return view(default_template() . '.pages.validation.modal.editModal.edit_validation_section', compact('validationSection'));
    }

    /**
     * Update selected validation section code value
     *
     * @param integer $id
     * @param Request $request
     * @return void
     */
    public function updateValidationSection(int $id, Request $request)
    {
        $rules = validation_value('update_validation_section_form');
        $this->validate($request, $rules);
        $validationSection = ValidationSection::find($id);
        $validationSection->section = $request->section;
        $validationSection->save();
        return $this->index();
    }
}

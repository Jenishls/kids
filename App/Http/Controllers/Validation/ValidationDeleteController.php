<?php

namespace App\Http\Controllers\Validation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Validation\Validation;
use App\Model\Validation\ValidationSection;
// use App\Http\Controllers\Validation\ValidationController;

class ValidationDeleteController extends ValidationController
{
    /**
     * Delete selected validation code value
     *
     * @param integer $id
     * @return void
     */
    public function deleteValidation(int $id, Request $request)
    {
        $validation = Validation::find($id);
        // $validation->code = $request->code;
        // $validation->value = $request->value;

        $validation->is_deleted = 1;
        $validation->deleted_at = date('Y-m-d H:i:s');
        $validation->userd_id = auth()->id();
        $validation->save();
    }

    /**
     * Delete selected validation section
     *
     * @param integer $id
     * @return void
     */
    public function deleteValidationSection(int $id, Request $request)
    {
        $validationSection = ValidationSection::find($id);
        // $validation->code = $request->code;
        // $validation->value = $request->value;

        $validationSection->is_deleted = 1;
        $validationSection->deleted_at = date('Y-m-d H:i:s');
        $validationSection->userd_id = auth()->id();
        $validationSection->save();
        return $this->index();
    }
}

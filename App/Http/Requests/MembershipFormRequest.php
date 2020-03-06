<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        foreach ($this->request->get('id_card_type') as $key => $val) {
            $rules['id_card_type.' . $key] = "required";
        }
        foreach ($this->request->get('id_card_no') as $key => $val) {
            $rules['id_card_no.' . $key] = "required";
        }
        foreach ($this->request->get('issued_place') as $key => $val) {
            $rules['issued_place.' . $key] = "required";
        }
        foreach ($this->request->get('issued_date') as $key => $val) {
            $rules['issued_date.' . $key] = "required";
        }
        foreach ($this->request->get('exp_date') as $key => $val) {
            $rules['exp_date.' . $key] = "required";
        }
        foreach ($this->request->get('issue_authority') as $key => $val) {
            $rules['issue_authority.' . $key] = "required";
        }
        return $rules;
    }
    /**
     * Get the error custom message field.
     *
     * @return messages
     */
    public function messages()
    {
        $messages = [];
        foreach ($this->request->get('id_card_type') as $key => $val) {
            $messages['id_card_type.' . $key] = 'The field labeled "Id Card must be required ' . $key . '" must be less than :max characters.';
        }
        foreach ($this->request->get('id_card_no') as $key => $val) {
            $messages['id_card_no.' . $key] = 'The field labeled "Id Card must be required ' . $key . '" must be less than :max characters.';
        }
        foreach ($this->request->get('issued_place') as $key => $val) {
            $messages['issued_place.' . $key] = 'The field labeled "Id Card must be required ' . $key . '" must be less than :max characters.';
        }
        foreach ($this->request->get('issued_date') as $key => $val) {
            $messages['issued_date.' . $key] = 'The field labeled "Id Card must be required ' . $key . '" must be less than :max characters.';
        }
        foreach ($this->request->get('exp_date') as $key => $val) {
            $messages['exp_date.' . $key] = 'The field labeled "Id Card must be required ' . $key . '" must be less than :max characters.';
        }
        foreach ($this->request->get('issue_authority') as $key => $val) {
            $messages['issue_authority.' . $key] = 'The field labeled "Id Card must be required ' . $key . '" must be less than :max characters.';
        }
        return $messages;
    }
}

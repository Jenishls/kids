<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'FirstName' => 'required|max:255',
            'LastName' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'PhoneNumber' => 'required',
            'role' => 'required'
        ];
    }

    public function messages(){
        return [
            "FirstName.required" => "Firsterrr"
        ];
    }

}

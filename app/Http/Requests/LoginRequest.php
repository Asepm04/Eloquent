<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' =>['required','min:10','email'],
            'password' =>['required',Password::min(6)->symbols()->numbers()->letters()]
        ];
    }

    public function prepareForValidation():void
    {
        $this->merge([ 'username'=>strtolower($this->input('username'))]);
    }

    public function passedValidation():void
    {
        $this->merge(['password'=>bcrypt($this->input('password'))]);
    }
}

<?php

namespace Pzd\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email'=> 'required|email|min:3|max:199|exists:users,email',
            'token' =>'required',
            'password' => 'required|between:6,199|same:password-confirmation'



        ];
    }
    public function attributes()
    {
        return [
            'password-confirmation' => 'تایید رمز عبور'
        ];
    }
}

<?php

namespace Pzd\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:199' ,
            'email'=>'required|email|min:3|max:199|unique:users,email',
            'password'=>'required|string|min:6|max:199',
            'accept'=>'required'
        ];
    }

}

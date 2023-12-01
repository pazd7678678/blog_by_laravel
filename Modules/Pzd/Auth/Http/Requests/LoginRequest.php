<?php

namespace Pzd\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email'=>'required|string|min:3|max:199|exists:users,email',
            'password'=>'required|string|min:6|max:199'
        ];
    }
}

<?php

namespace Pzd\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sendEmailPasswordRecoveryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => 'required|email|min:3|max:199|exists:users,email'
        ];
    }
}

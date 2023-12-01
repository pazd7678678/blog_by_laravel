<?php

namespace Pzd\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check() === true;
    }


    public function rules(): array
    {
        $rules =  [
            'name' => 'required|string|between:3,190' ,
            'email'=> 'required|email|between:3,190|unique:users,email',
            'password' => 'required|string|between:6,190'
        ];
        if(request()->method() === 'PATCH')
        {
            $rules['email'] = 'required|email|between:3,190|unique:users,email,' . request()->id;
            $rules['password'] = 'nullable|string|between:6,190';
        }
        return $rules;
    }
}

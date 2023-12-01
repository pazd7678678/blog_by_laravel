<?php

namespace Pzd\User\Http\Requests\Home;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check() === true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:users,name,' . auth()->id(),
            'email' => 'required|email|min:3|max:255|unique:users,email,' . auth()->id(),
            'password' => 'nullable|string|min:6|max:255',
            'telegram' => 'nullable|string|min:3|max:255|unique:users,telegram,' . auth()->id(),
            'linkedin' => 'nullable|string|min:3|max:255|unique:users,linkedin,' . auth()->id(),
            'twitter' => 'nullable|string|min:3|max:255|unique:users,twitter,' . auth()->id(),
            'instagram' => 'nullable|string|min:3|max:255|unique:users,instagram,' . auth()->id(),
            'bio' => 'nullable|string|min:3',
            'imageName' => 'nullable|string',
            'imagePath' => 'nullable|string',
        ];
    }
}

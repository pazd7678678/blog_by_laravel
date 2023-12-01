<?php

namespace Pzd\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRoleRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check() == true;
    }

    public function rules(): array
    {
        return [
            'roles' => 'required|array|exists:roles,name'
        ];
    }
    public function attributes()
    {
       return ['roles' => 'مقام'];
    }
}

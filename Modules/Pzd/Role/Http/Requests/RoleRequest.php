<?php

namespace Pzd\Role\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check() == true;
    }


    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|min:3|max:190|unique:roles,id' ,
            'permissions' => 'required|array|min:1'
        ];
        if(request()->method == 'PATCH')
        {
            $rules['name'] =  'required|string|min:3|max:190|unique:roles,id,' . request()->id;
            $rules['permissions'] = 'nullable|array|min:1';
        }
        return $rules;
    }

    public function attributes()
    {
        return ['permissions' => 'دسترسی ها'];
    }
}

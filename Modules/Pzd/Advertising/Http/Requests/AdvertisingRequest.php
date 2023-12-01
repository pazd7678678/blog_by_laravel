<?php

namespace Pzd\Advertising\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Pzd\Advertising\Models\Advertising;

class AdvertisingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check() == true;
    }


    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|min:3|max:190|unique:advertisings,title',
            'link' => 'nullable|string|max:190|min:9',
            'image' => 'required|file|max:2048|mimes:jpeg,jpg,png',
            'location' => ['required' , 'string' , Rule::in(Advertising::$locations)]

        ];

        if(request()->method == 'PATCH')
        {
            $rules['title'] = 'required|string|min:3|max:190|unique:advertisings,title,' . request()->id;
            $rules['image'] =  'nullable|file|max:2048|mimes:jpeg,jpg,png';
        }
        return $rules;
    }
}

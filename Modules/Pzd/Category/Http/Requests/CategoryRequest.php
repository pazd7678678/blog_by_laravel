<?php

namespace Pzd\Category\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Pzd\Category\Models\Category;

class CategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check() == true;
    }


    public function rules(): array
    {
        $rules = [

                    'parent_id'=> 'nullable|exists:categories,id' ,
                    'title'=> 'required|string|min:3|max:190|unique:categories,id' ,
                    'keywords'=> 'nullable|string|min:3|max:190' ,
                    'description'=> 'nullable|string|min:3' ,
                    'status'=> ['required','string' , Rule::in(Category::$statuses)]
        ];
        if(request()->method == 'PATCH')
        {
            $rules['title'] = 'required|string|min:3|max:190|unique:categories,id,' .  request()->id;
        }
        return $rules;
    }
}

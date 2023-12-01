<?php

namespace Pzd\Article\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Pzd\Article\Models\Article;

class ArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() ==  true;
    }

    public function rules(): array
    {
        $rules = [
           'category_id' =>'required|exists:categories,id',
            'title' =>  'required|string|min:3|max:190|unique:articles,title' ,
            'time_to_read' =>  'required|numeric' ,
            'image' => 'required|file|mimes:png,jpg,jpeg|max:2048' ,
            'score' =>  'required|numeric|in:0,1,2,3,4,5,6,7,8,9,10',
            'status' =>  ['required'  , Rule::in(Article::$statuses)] ,
            'type' => ['nullable'  , Rule::in(Article::$types)] ,
            'body' =>  'required|string|min:3' ,
        ];
        if(request()->method == 'PATCH')
        {
            $rules['title'] = 'required|string|min:3|max:190|unique:articles,title,' . request()->id ;
            $rules['image'] = 'nullable|file|mimes:png,jpg,jpeg|max:2048';
        }
        return $rules;
    }
}

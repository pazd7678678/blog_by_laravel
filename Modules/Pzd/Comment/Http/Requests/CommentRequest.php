<?php

namespace Pzd\Comment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check() == true;
    }


    public function rules(): array
    {
        return [
            'body' => 'required|string|min:3|max:1000'
        ];
    }
}

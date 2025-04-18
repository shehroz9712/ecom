<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'             => 'required|string|max:255',
            'slug'              => 'nullable|string|max:255|unique:blogs,slug',
            'image'             => 'nullable|exists:media,id|integer',
            'short_description' => 'required|string|max:1000',
            'long_description'  => 'required|string',
            'author_name'       => 'required|string|max:100',
            'author_image'      => 'nullable|exists:media,id|integer',
            'meta_keyword'      => 'nullable|string',
            'meta_description'  => 'nullable|string',
            'status'            => 'required|in:active,inactive',

        ];
    }
}

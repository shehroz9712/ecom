<?php

namespace App\Http\Requests;

use App\Rules\ValidPageImage;
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'              => 'required|string|unique:pages,title|max:100',
            'slug'               => 'nullable|string|unique:pages,slug',
            'heading'            => 'required|max:255',
            'page_image'         => ['nullable', new ValidPageImage()],
            'short_description'  => 'required|string|max:700',
            'long_description'   => 'required|string',
            'meta_keywords'      => 'nullable|string',
            'meta_description'   => 'nullable|string',
            'sort'               => 'nullable|integer',
            'status'             => 'required|in:active,inactive',
        ];
    }
}

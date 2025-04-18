<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuccessStoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'             => 'required|string|max:255',
            'name'              => 'required|string|max:255',
            'designation'       => 'nullable|string|max:255',
            'company'           => 'nullable|string|max:255',
            'description'       => 'required|string',
            'results'           => 'nullable|string|max:255',
            'image'            => 'nullable|integer|exists:media,id',
            'meta_keywords'     => 'nullable|string|max:255',
            'meta_description'  => 'nullable|string|max:1000',
            'results'           => 'nullable|string|max:255',
            'status'            => 'required|in:active,inactive',
        ];
    }
}

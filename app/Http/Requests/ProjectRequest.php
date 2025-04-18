<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'media_id' => 'nullable|integer|exists:media,id',
            'url' => 'nullable|url|max:500',
        ];
    }
}

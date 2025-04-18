<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomSectionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:500',
            'sort' => 'required|integer|min:1',
            'status' => 'required|in:active,inactive',
        ];
    }
}

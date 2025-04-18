<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'level' => 'required|string|max:50',
            'sort' => 'nullable|integer',
            'status' => 'nullable|in:active,inactive',
        ];
    }
}

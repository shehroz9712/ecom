<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReferenceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'contact_no' => 'nullable|string|max:100',
            'email' => 'required|email|max:150',
            'company' => 'required|string|max:100',
            'designation' => 'nullable|string|max:100',
            'sort' => 'nullable|integer',
            'status' => 'nullable|in:active,inactive',
        ];
    }
}

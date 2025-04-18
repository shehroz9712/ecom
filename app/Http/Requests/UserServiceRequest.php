<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'delievered' => 'nullable|boolean',
        ];
    }
}

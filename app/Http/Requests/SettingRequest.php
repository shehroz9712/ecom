<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'key' => 'nullable|string|max:255|unique:settings,key',
            'value' => 'nullable|string',
            'status' => 'nullable|boolean',
            'deletable' => 'nullable|boolean',
        ];
    }
}

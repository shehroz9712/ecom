<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => 'required|string|max:200',
            'description'   => 'required|string|max:200',
            'body'          => 'nullable|string',
            'date'          => 'required|date|before_or_equal:today',
            'sort'          => 'nullable|integer|min:1|max:1264',
            'status'        => 'nullable|in:active,inactive',
        ];
    }
}

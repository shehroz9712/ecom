<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'        => 'required|string|max:200',
            'description'  => 'required|string|max:200',
            'institute'    => 'required|string|max:200',
            'date'         => 'required|date|before_or_equal:today',
            'sort'         => 'required|integer|min:1',
            'status'       => 'required|in:active,inactive',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'        => 'nullable|string|max:100',
            'name'         => 'required|string|max:50',
            'description'  => 'required|string|max:1000',
            'rating'       => 'nullable|numeric|between:1,5',
            'status'       => 'required|in:active,inactive',
        ];
    }
}

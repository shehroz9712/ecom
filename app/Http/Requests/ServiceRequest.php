<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'media_id' => 'required|exists:media,id|integer',
            'price' => 'required|numeric|min:0.01|max:9999999.99',
            'discounted_price' => 'required|numeric|min:0|max:9999999.99',
            'description' => 'required|string',
            'additional_heading' => 'nullable|string',
            'additional_description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ];
    }
}

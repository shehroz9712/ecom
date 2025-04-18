<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'service_id' => 'required|integer|exists:services,id',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'media_id' => 'nullable|integer|exists:media,id',
            'device_type' => 'nullable|string',
            'device_id' => 'nullable|string',
            'status' => 'nullable|in:active,inactive',
        ];
    }
}

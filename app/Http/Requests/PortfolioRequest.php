<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'media_id' => 'required|integer|exists:media,id',
            'status' => 'nullable|in:active,inactive',
        ];
    }
}

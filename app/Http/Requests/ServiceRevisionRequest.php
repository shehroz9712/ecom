<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRevisionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'services' => 'array',
            'services.*.service_id' => 'required|integer|exists:services,id',
            'services.*.is_revision' => 'required|boolean',
        ];
    }
}

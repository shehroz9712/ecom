<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PackageSubscribeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'package_id' => 'required|integer|exists:packages,id',
          'payment_method_id' => 'required|integer|exists:payment_methods,id',
        ];
    }
}

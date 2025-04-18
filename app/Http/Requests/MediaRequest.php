<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
           'name' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (request()->hasFile($attribute)) {
                        if (!in_array(request()->file($attribute)->extension(), ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
                            $fail("The $attribute must be a valid image.");
                        }
                    } elseif (!filter_var($value, FILTER_VALIDATE_URL) || !preg_match('/\.(jpg|jpeg|png|gif|svg)$/i', $value)) {
                        $fail("The $attribute must be a valid image URL.");
                    }
                }
            ],
            'status' => 'nullable|in:active,inactive',
        ];
    }
}

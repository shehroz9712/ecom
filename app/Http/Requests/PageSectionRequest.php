<?php

namespace App\Http\Requests;

use App\Rules\ValidSectionImageIdOrUrlRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageSectionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $allowedFields = ['image-left', 'image-right']; // Allowed fields
        return [
            'page_id'            => 'required|integer|exists:pages,id',
            'section_layout'     => ['nullable','string','max:50',Rule::in($allowedFields)],
            'section_name'       => 'required|max:50',
            'heading'            => 'required|max:255',
            'description'        => 'required',
            'images'             => ['nullable', new ValidSectionImageIdOrUrlRules()],
            'button_name'        => 'nullable|string|max:50',
            'button_url'         => 'nullable|string|max:255',
            'counter'            => 'nullable|string',
            'sort'               => 'required|integer',
            'status'             => 'required|in:active,inactive',
        ];
    }
}


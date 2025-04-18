<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                          => 'required|string|max:100',
            'resume_templates'              => 'nullable|integer|min:1',
            'cover_templates'               => 'nullable|integer|min:1',
            'image'                         => 'nullable|integer|exists:media,id',
            'description'                   => 'nullable|string',
            'price'                         => 'required',
            'duration'                      => 'required|integer',
            'coins'                         => 'nullable|integer',
            'display'                       => 'required|boolean',
            'spell_and_grammar_tries'       => 'nullable|integer',
            'resume_parser_tries'           => 'nullable|integer',
            'max_services'                  => 'nullable|integer',
            'ai_based_cover_letter_tries'   => 'nullable|integer',
            'sort'                          => 'required|integer',
            'status'                        => 'required|in:active,inactive',
        ];
    }
}

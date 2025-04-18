<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PackageUsagedRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $allowedFields = ['used_resume_templates','used_cover_templates','used_services','used_spell_grammar_tries','used_resume_parser_tries','used_ai_cover_letter_tries']; // Allowed fields
        
        return [
            'type' => ['required', Rule::in($allowedFields)], 
            'value' => 'required|integer|in:1',
        ];
    }
}

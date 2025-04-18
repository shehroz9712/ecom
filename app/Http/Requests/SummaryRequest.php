<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SummaryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'resume_id'   => 'required|exists:resumes,id|integer',
            'status'      => 'nullable|in:active,inactive',
        ];
    }
}

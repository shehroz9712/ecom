<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EducationRequest extends ApiFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'institution'        => 'required|string|max:255',
            'degree'             => 'required|string|max:50',
            'field'              => 'required|string|max:255',
            'grade_type'         => 'required|in:cgpa,grade,percentage,none',
            'grade'              => 'required|string|max:20',
            'start_date'         => 'required|date|before_or_equal:today',
            'end_date'           => 'required_unless:currently_studying,1|date|after_or_equal:start_date',
            'currently_studying' => 'nullable|boolean',
            'sort'               => 'integer|min:1',
            'status'             => 'required|in:inactive,active',
        ];
    }


    protected function prepareForValidation()
    {
        if ($this->filled('end_date') && $this->has('currently_studying')) {
            $this->merge([
                'currently_studying' => 0,
            ]);
        }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'job_position'        => 'required|string|max:255',
            'company_name'        => 'required|string|max:255',
            'country_id'          => 'required|integer|exists:countries,id',
            'state'               => 'required|string|max:50',
            'city'                => 'required|string|max:50',
            'type'                => 'required|in:Onsite,Remote,Hybrid',
            'start_date'          => 'required|date|before_or_equal:today',
            'end_date'            => 'nullable|date|after_or_equal:start_date',
            'currently_working'   => 'nullable|boolean',
            'company_description' => 'required|string',
            'job_description'     => 'required|string',
            'sort'                => 'nullable|integer|min:1',
            'status'              => 'required|in:active,inactive',
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->filled('end_date') && $this->has('currently_working')) {
            $this->merge([
                'currently_working' => 0,
            ]);
        }
    }
}

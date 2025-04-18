<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'resume_title'          => 'nullable|string|max:100',

            'resume_first_name'     => 'nullable|string|max:100',
            'resume_last_name'      => 'nullable|string|max:100',
            'resume_job_title'      => 'nullable|string|max:100',
            'resume_phone_no'       => ['nullable', 'regex:/^\+?[0-9\s\-()]{7,15}$/'],
            'resume_email'          => 'nullable|string|max:50',
            'resume_website_link'   => 'nullable|string|max:255',
            'resume_summary'        => 'nullable|string',
            
            'heading_fontsize'      => 'nullable|string|max:50',
            'paragraph_fontsize'    => 'nullable|string|max:50',
            'heading_font_style'    => 'nullable|string|max:100',
            'paragraph_font_style'  => 'nullable|string|max:100',
            'top_bottom_margins'    => 'nullable|string|max:50',
            'side_margins'          => 'nullable|string|max:50',
            'paragraph_spacing'     => 'nullable|string|max:50',
            'section_spacing'       => 'nullable|string|max:50',
            'color'                 => 'nullable|string|max:50',

            'show_experience'       => 'boolean',
            'show_certificates'     => 'boolean',
            'show_awards'           => 'boolean',
            'show_references'       => 'boolean',
            'show_languages'        => 'boolean',
            'show_technical_skills' => 'boolean',
            'show_soft_skills'      => 'boolean',
            'status'                => 'required|in:active,inactive',
        ];
    }
}

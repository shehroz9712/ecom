<?php

namespace App\Http\Requests;

use App\Models\ResumeHeader;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ResumeHeaderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = Auth::user()->id;
        $resumeHeaderId = $this->route('id');
        $resumeHeader = ResumeHeader::find($resumeHeaderId);

        return [
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'email'      => [
                'required',
                'email',
                Rule::unique('resume_headers', 'email')->ignore($resumeHeaderId),
            ],
            'resume_id'       => 'required|exists:resumes,id|integer',
            'job_position'    => 'nullable|string|max:255',
            'contact'        => [
                'required',
                Rule::unique('resume_headers', 'contact')->ignore($resumeHeaderId),
            ],
            'phone_number'        => [
                'required',
                Rule::unique('resume_headers', 'phone_number')->ignore($resumeHeaderId),
            ],
            'media_id'        => 'nullable|exists:media,id|integer',
            'website'         => 'nullable|url|max:255',
            'country_id'      => 'required|exists:countries,id|integer',
            'state_id'        => 'required|exists:states,id|integer',
            'city_id'         => 'required|exists:cities,id|integer',
            'address'         => 'nullable|string|max:255',
            'postal_code'     => 'nullable|string|max:10',
        ];
    }
}

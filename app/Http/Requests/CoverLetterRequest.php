<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CoverLetterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cover_template_id'         => 'nullable|integer',
            'cover_letter_title'        => 'required|string|max:255',
            'first_name'                => 'required|string|max:255',
            'last_name'                 => 'nullable|string|max:255',
            'date'                      => 'nullable|date',

            'contact_person_name'       => 'nullable|string|max:50',
            'contact_person_designation' => 'nullable|string|max:100',
            'contact_person_email'      => 'nullable|email|max:50',
            'contact_person_phone'      => 'nullable|string|max:50',
            'company_name'              => 'nullable|string|max:100',
            'company_address'           => 'nullable|string|max:100',

            'phone_number'              => 'required|string|regex:/^[0-9\-]+$/|max:15',
            'email_address'             => 'required|email|max:255',
            'street_address'            => 'nullable|string|max:255',
            'country_id'                => 'required|exists:countries,id',
            'state'                     => 'nullable|string|max:50',
            'city'                      => 'nullable|string|max:50',
            'zip_code'                  => 'nullable|string|max:20',

            'experience'                => 'nullable|string|max:50',
            'job_position'              => 'nullable|string|max:255',

            'body_detail'               => 'nullable|string',
            'closer_detail'             => 'nullable|string',

            'type'                      => 'nullable|string|in:type,draw,upload',
            'signature' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) {
                    $request = $this;
                    // Check if 'type' is 'upload' and if 'signature' is numeric (a media ID)
                    if ($request->has('type') && $request->type === 'upload' && is_numeric($value)) {
                        $exists = DB::table('media')->where('id', $value)->exists();

                        if (!$exists) {
                            $fail('The selected media ID does not exist.');
                        }
                    }
                },
            ],

            'status'                    => 'nullable|in:active,inactive',
        ];
    }
}

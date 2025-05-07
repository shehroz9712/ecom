<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserUpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        $userId = auth()->id(); // Get current authenticated user ID

        return [
            'first_name'  => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name'   => ['required', 'string', 'max:255'],
            'email'       => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $userId . ',id', // Fix for Laravel unique validation
                'regex:/^[^\s@]+@(?!example\.com|test\.com|fakeemail\.com)([a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/', // Exclude test domains
            ],
            'mobile_number'      => ['required', 'regex:/^\+?[0-9\s\-()]{7,15}$/'], // Allows 7-15 digits, +, spaces, -, ()
            'phone_number'      => ['nullable', 'regex:/^\+?[0-9\s\-()]{7,15}$/'], // Allows 7-15 digits, +, spaces, -, ()
            'contact'     => ['nullable', 'regex:/^\+?[0-9\s\-()]{7,15}$/'],
            'country_id'  => ['required', 'integer', 'exists:countries,id'],
            'state_id'    => ['nullable', 'integer', 'exists:states,id'],
            'city'     => ['nullable', 'string', 'max:255'],
            'address'     => ['nullable', 'string', 'max:255'],
            'zip_code'    => ['nullable', 'string', 'max:50'],
            'job_title'   => ['nullable', 'string', 'max:255'],
            'experience'  => ['nullable', 'string', 'max:255'],
        ];
    }
}

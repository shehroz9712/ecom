<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEmailUpdateRequest extends FormRequest
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
            'email'       => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $userId . ',id', // Fix for Laravel unique validation
                'regex:/^[^\s@]+@(?!example\.com|test\.com|fakeemail\.com)([a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/', // Exclude test domains
            ],
        ];
    }
}

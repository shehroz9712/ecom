<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('id');

        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
            'job_position' => 'nullable|string|max:255',
            'media_id' => 'required|exists:media,id|integer',
            'password' => 'required|min:6|max:15',
            'password_confirmation' => 'required|min:6|max:15|same:password',
            'status' => 'required|in:active,inactive',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'job_position' => 'nullable|string|max:255',
            'contact' => 'nullable|unique:users,contact|min:10',
            'media_id' => 'required|exists:media,id|integer',
            'password' => 'required|min:6|max:15',
            'password_confirmation' => 'required|min:6|max:15|same:password',
            'status' => 'required|in:active,inactive',
        ];
    }
}

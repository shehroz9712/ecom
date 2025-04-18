<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends ApiFormRequest
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
        return [
            'name' => 'required|max:80',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|unique:users,contact|min:10',
            'country_id' => 'required|integer',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6',
        ];
    }
}

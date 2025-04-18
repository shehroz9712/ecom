<?php

namespace App\Http\Requests;

use App\Http\Controllers\Api\v1\BaseController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiFormRequest extends FormRequest
{
    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            (new BaseController())->respondBadRequest(
                $validator->errors()->toArray(),
                false,
                'Validation failed!'
            )
        );
    }
}

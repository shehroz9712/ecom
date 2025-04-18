<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class PageFilterRequest extends ApiFormRequest
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
     */
    public function rules(): array
    {
        $allowedFields = ['id', 'title', 'heading']; // Allowed fields

        return [
            'page'      => 'nullable|integer|min:1',
            'limit'     => 'nullable|integer|min:1|max:100',

            'search'    => ['nullable', 'array'],
            'search.*'  => ['string', function ($attribute, $value, $fail) use ($allowedFields) {
                if (!in_array(str_replace('search.', '', $attribute), $allowedFields)) {
                    $fail("The search field '{$attribute}' is not allowed.");
                }
            }],

            'where'     => ['nullable', 'array'],
            'where.*'   => ['string', function ($attribute, $value, $fail) use ($allowedFields) {
                if (!in_array(str_replace('where.', '', $attribute), $allowedFields)) {
                    $fail("The where field '{$attribute}' is not allowed.");
                }
            }],

            'order'     => ['nullable', Rule::in($allowedFields)],
            'direction' => ['nullable', Rule::in(['ASC', 'DESC'])],
        ];
    }
}

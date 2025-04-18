<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Media;

class ValidPageImage implements Rule
{
    public function passes($attribute, $value)
    {
        if (is_numeric($value)) {
            return Media::where('id', $value)->exists();
        }

        return Media::where('url', $value)->exists();
    }

    public function message()
    {
        return 'The :attribute must be a valid media ID or media URL.';
    }
}

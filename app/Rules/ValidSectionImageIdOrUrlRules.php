<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Media;

class ValidSectionImageIdOrUrlRules implements Rule
{
    public function passes($attribute, $value)
    {
        if (!$value) return true;

        $items = explode(',', $value);

        foreach ($items as $item) {
            $item = trim($item);

            if (is_numeric($item)) {
                if (!Media::where('id', $item)->exists()) {
                    return false;
                }
            } elseif (filter_var($item, FILTER_VALIDATE_URL)) {
                if (!Media::where('url', $item)->exists()) {
                    return false;
                }
            } else {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'Each image must be a valid media ID or URL existing in the media library.';
    }
}
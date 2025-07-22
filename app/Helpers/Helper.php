<?php

use App\Models\Setting;
use Illuminate\Support\Number;

function uploadImage($file, $folder): string
{
    if ($file  && $file != null) {

        $path = public_path('assets/uploads/' . $folder . '/');
        $extension = $file->getClientOriginalExtension();
        $image_name = time() . '.' . $extension;
        $file->move($path, $image_name);
        return $image_name;
    } else {
        $image_name = 'no-image.png';
    }
    return $image_name;
}


function StatusBadge($status)
{
    $colors = [
        'pending' => 'warning',
        'processing' => 'info',
        'on_hold' => 'secondary',
        'completed' => 'success',
        'active' => 'success',
        'cancelled' => 'dark',
        'refunded' => 'primary',
        'failed' => 'danger',
        'inactive' => 'danger',
    ];

    return '<span class="badge bg-' . ($colors[$status] ?? 'light') . '">' . ucfirst($status) . '</span>';
}


if (!function_exists('productImage')) {
    function productImage($image): string
    {
        if ($image && file_exists(public_path('assets/uploads/products/' . $image))) {
            return asset('assets/uploads/products/' . $image);
        }
        return asset('uploads/no-image.png');
    }
}

// amount with currency formatting
if (!function_exists('productAmount')) {
    function productAmount($amount,  $decimal = 2, $currency = null,): string
    {
        $settings = Setting::first();

        if (!$currency) {
            $currency = $settings && $settings->currency ? $settings->currency : 'PKR';
        }

        $position = $settings && $settings->currency_position === 'right' ? 'right' : 'left';

        $formatted = number_format($amount, $decimal);

        return $position === 'left'
            ? $currency . ' ' . $formatted
            : $formatted . ' ' . $currency;
    }
}

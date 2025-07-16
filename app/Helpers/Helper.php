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

function darkLogo(): string
{
    $image = Setting::first()->dark_logo;
    if ($image && file_exists(public_path('assets/uploads/logo/' . $image))) {
        return asset('assets/uploads/logo/' . $image);
    }
    return asset('uploads/no-image.png');
}

function favicon(): string
{
    $image = Setting::first()->favicon;

    if ($image && file_exists(public_path('assets/uploads/logo/' . $image))) {
        return asset('assets/uploads/logo/' . $image);
    }
    return asset('uploads/no-image.png');
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


if (!function_exists('format_price')) {
    function format_price($amount, $currency = '$', $decimal = 2)
    {
        return $currency . Number::format($amount, $decimal);
    }
}

<?php


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

<?php

namespace App\Traits;

trait UploadImage
{
    private function uploadImage($request, $class, $old_image = null)
    {

        if ($request->has('image')) {
            if ($old_image) {
                $this->deleteImage($old_image, $class::UPLOAD_PATH);
            }

            $image = $request->file('image');
            $image_name = time() . '-' . $image->getClientOriginalName();
            // $image->storeAs($class::UPLOAD_PATH, $image_name);
            $image->move(public_path($class::UPLOAD_PATH), $image_name);
        }

        return $image_name ?? $old_image;
    }

    private function deleteImage($image_name, $path)
    {

        if ($image_name && file_exists(public_path($path . $image_name))) {
            unlink(public_path($path . $image_name));
        }
    }
}

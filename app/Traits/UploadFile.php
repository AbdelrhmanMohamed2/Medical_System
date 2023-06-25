<?php

namespace App\Traits;

trait UploadFile
{
    private function uploadFile($request, $class, $old_file = null, $input_name = 'image')
    {
        if ($request->has($input_name) && !is_null($request->$input_name)) {
            if ($old_file) {
                $this->deleteFile($old_file, $class::UPLOAD_PATH);
            }

            $file = $request->file($input_name);
            $file_name = time() . '-' . $file->getClientOriginalName();
            // $file->storeAs($class::UPLOAD_PATH, $file_name);
            $file->move(public_path($class::UPLOAD_PATH), $file_name);
        }

        return $file_name ?? $old_file;
    }

    private function deleteFile($file_name, $path)
    {

        if ($file_name && $file_name != 'default_image.png' && file_exists(public_path($path . $file_name))) {
            unlink(public_path($path . $file_name));
        }
    }
}

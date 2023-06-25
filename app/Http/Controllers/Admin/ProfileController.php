<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\{UpdateImageRequest, UpdatePasswordRequest};
use App\Models\Doctor;
use App\Models\User;
use App\Traits\UploadFile;

class ProfileController extends Controller
{
    use UploadFile;
    public function profile()
    {
        $user = auth()->user();
        return view('Admin.Dashboard.profile', compact('user'));
    }

    public function update_image(UpdateImageRequest $request)
    {
        $user = User::find(auth()->id());

        $image_name = $this->uploadFile($request, Doctor::class, $user->image, 'image');
        $user->update([
            'image' => $image_name,
        ]);
        return redirect()->back()->with('success', 'Image updated successfully');
    }

    public function update_password(UpdatePasswordRequest $request)
    {
        $user = User::find(auth()->id());

        $user->update([
            'password' => $request->password,
        ]);
        return redirect()->back()->with('success', 'Password updated successfully');
    }
}

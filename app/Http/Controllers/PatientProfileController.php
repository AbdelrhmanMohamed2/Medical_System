<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Models\Setting;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\Profile\UpdateImageRequest;
use App\Http\Requests\Admin\Profile\UpdatePasswordRequest;

class PatientProfileController extends Controller
{
    use UploadFile;
    public function profile()
    {
        $settings = Setting::pluck('value', 'key');
        return view('end_user.profile', compact('settings'));
    }

    public function updateImage(UpdateImageRequest $request)
    {
        $user = User::find(auth()->id());

        $image_name = $this->uploadFile($request, Patient::class, $user->image, 'image');
        $user->update([
            'image' => $image_name,
        ]);
        return redirect()->back()->with('success', 'Image updated successfully');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = User::find(auth()->id());

        $user->update([
            'password' => $request->password,
        ]);
        return redirect()->back()->with('success', 'Password updated successfully');
    }

    public function updateInfo(Request $request)
    {
        $user = User::find(auth()->id());
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users,phone,' . auth()->id(),
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'address' => 'nullable|min:3|max:50',
        ]);
        $user->update([
            'phone' => $validator->validated()['phone'],
            'email' => $validator->validated()['email'],
        ]);
        $user->patient->update([
            'address' => $validator->validated()['address'],
        ]);
        return redirect()->back()->with('success', 'info updated successfully');
    }
}

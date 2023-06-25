<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadFile;
use App\Http\Controllers\Controller;

use App\Models\{
    Doctor,
    User,
    Specialty
};

use App\Http\Requests\Admin\Doctor\{
    StoreDoctorRequest,
    UpdateDoctorRequest
};

class DoctorController extends Controller
{
    use UploadFile;


    public function index()
    {
        $doctors = Doctor::with(['specialty', 'user'])->latest('id')->paginate();

        return view('Admin.doctor.index', compact('doctors'));
    }

    public function create()
    {
        $specialties = Specialty::get();
        return view('Admin.doctor.create', compact('specialties'));
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $validated_data = $request->validated();
        if (is_null($validated_data['password'])) {
            unset($validated_data['password']);
            unset($validated_data['password_confirmation']);
        }
        $image_name = $this->uploadFile($request, Doctor::class, $doctor->user->image);
        $doctor->update($validated_data);
        $doctor->user->update(['image' => $image_name, 'type' => 'doctor'] + $validated_data);
        // toast('Doctor Updated Successfully', 'success');
        return redirect()->back()->with('success', 'Doctor Updated successfully');
    }

    public function edit(Doctor $doctor)
    {
        $specialties = Specialty::get();
        return view('Admin.doctor.edit', compact('doctor', 'specialties'));
    }

    public function store(StoreDoctorRequest $request)
    {
        $image_name = $this->uploadFile($request, Doctor::class);
        User::create(['image' => $image_name, 'type' => 'doctor'] + $request->validated())->doctor()->create($request->validated());
        // toast('Doctor Added Successfully', 'success');
        return redirect()->back()->with('success', 'Doctor Added successfully');
    }

    public function show(Doctor $doctor)
    {
        return view('Admin.doctor.show', compact('doctor'));
    }

    public function destroy(Doctor $doctor)
    {
        $this->deleteFile($doctor->user->image, Doctor::UPLOAD_PATH);
        $doctor->user->delete();
        // $doctor->delete();
        // toast('Doctor deleted successfully', 'success');
        return redirect()->back()->with('success', 'Doctor deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\{User, Doctor};
use App\Http\Controllers\Controller;
use App\Traits\{UploadFile, ApiTrait};
use App\Http\Requests\Admin\Doctor\{StoreDoctorRequest, UpdateDoctorRequest};

class DoctorController extends Controller
{
    use UploadFile, ApiTrait;

    public function index()
    {
        $doctors = Doctor::with(['specialty', 'user'])->latest('id')->paginate();
        return $this->apiResponse(data: $doctors);
    }

    public function show(Doctor $doctor)
    {
        $doctor->load('user');
        return $this->apiResponse(data: $doctor);
    }

    public function store(StoreDoctorRequest $request)
    {
        $image_name = $this->uploadFile($request, Doctor::class);
        $doctor = User::create(['image' => $image_name, 'type' => 'doctor'] + $request->validated())->doctor()->create($request->validated());
        return $this->apiResponse(data: $doctor, message: 'Doctor Added successfully');
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $validated_data = $request->validated();
        if (isset($validated_data['password']) && is_null($validated_data['password'])) {
            unset($validated_data['password']);
            unset($validated_data['password_confirmation']);
        }
        $image_name = $this->uploadFile($request, Doctor::class, $doctor->user->image);
        $doctor->update($validated_data);
        $doctor->user->update(['image' => $image_name, 'type' => 'doctor'] + $validated_data);
        return $this->apiResponse(data: $doctor, message: 'Doctor Updated successfully');
    }

    public function destroy(Doctor $doctor)
    {
        $this->deleteFile($doctor->user->image, Doctor::UPLOAD_PATH);
        $doctor->user->delete();
        return $this->apiResponse(message: 'Doctor deleted successfully');
    }
}

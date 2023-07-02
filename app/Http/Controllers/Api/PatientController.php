<?php

namespace App\Http\Controllers\Api;

use App\Models\{User, Patient};
use App\Http\Controllers\Controller;
use App\Traits\{ApiTrait, UploadFile};
use App\Http\Requests\Admin\Patient\{StorePatientRequest, UpdatePatientRequest};

class PatientController extends Controller
{
    use UploadFile, ApiTrait;

    public function index()
    {
        $patients = Patient::with(['user', 'examinations'])->paginate();
        return $this->apiResponse(data: $patients);
    }

    public function show(Patient $patient)
    {
        $patient->load('user');
        return $this->apiResponse(data: $patient);
    }

    public function store(StorePatientRequest $request)
    {
        $image_name = $this->uploadFile($request, Patient::class);
        $patient = User::create(['image' => $image_name, 'type' => 'patient'] + $request->validated())->patient()->create($request->validated());
        return $this->apiResponse(data: $patient, message: 'Patient Added Successfully');
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $validated_data = $request->validated();
        if (isset($validated_data['password']) && is_null($validated_data['password'])) {
            unset($validated_data['password']);
            unset($validated_data['password_confirmation']);
        }
        $image_name = $this->uploadFile($request, Patient::class, $patient->user->image);
        $patient->update($validated_data);
        $patient->user->update(['image' => $image_name, 'type' => 'patient'] + $validated_data);
        return $this->apiResponse(data: $patient, message: 'Patient Updated successfully');
    }

    public function destroy(Patient $patient)
    {
        $this->deleteFile($patient->user->image, Patient::UPLOAD_PATH);
        $patient->user->delete();
        return $this->apiResponse(message: 'Patient deleted successfully');
    }
}

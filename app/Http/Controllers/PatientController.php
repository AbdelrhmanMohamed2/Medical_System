<?php

namespace App\Http\Controllers;

use App\Models\{User, Patient};
use App\Http\Requests\Admin\Patient\{StorePatientRequest, UpdatePatientRequest};
use App\Traits\UploadImage;

class PatientController extends Controller
{
    use UploadImage;

    public function index()
    {
        $patients = User::where('type', 'patient')->with(['patient.examinations'])->paginate();
        // $patients = Patient::with(['user','examinations'])->paginate();
        return view('Admin.patient.index', compact('patients'));
    }


    public function create()
    {
        return view('Admin.patient.create');
    }


    public function store(StorePatientRequest $request)
    {
        $image_name = $this->uploadImage($request, Patient::class);
        User::create(['image' => $image_name, 'type' => 'patient'] + $request->validated())->patient()->create($request->validated());
        toast('Patient Created Successfully', 'success');
        return redirect()->back();
    }


    public function show(Patient $patient)
    {
        //
    }


    public function edit(Patient $patient)
    {
        //
    }


    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }


    public function destroy(Patient $patient)
    {
        // $user_id = $patient->user_id;
        // $patient->user_id = null;
        // $patient->delete();
        // User::where('id', $user_id)->delete();
        // $this->deleteImage($patient->user->image, Patient::UPLOAD_PATH);
        // toast('Patient deleted successfully', 'success');
        return redirect()->back();
    }
}

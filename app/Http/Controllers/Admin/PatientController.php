<?php
namespace App\Http\Controllers\Admin;

use App\Traits\UploadFile;
use App\Models\{User, Patient};
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Patient\{StorePatientRequest, UpdatePatientRequest};

class PatientController extends Controller
{
    use UploadFile;

    public function index()
    {
        // $patients = User::where('type', 'patient')->with(['patient.examinations'])->paginate();
        $patients = Patient::with(['user','examinations'])->paginate();
        return view('Admin.patient.index', compact('patients'));
    }


    public function create()
    {
        return view('Admin.patient.create');
    }


    public function store(StorePatientRequest $request)
    {
        $image_name = $this->uploadFile($request, Patient::class);
        User::create(['image' => $image_name, 'type' => 'patient'] + $request->validated())->patient()->create($request->validated());
        // toast('Patient Created Successfully', 'success');
        return redirect()->back()->with('success', 'Patient Added Successfully');
    }


    public function show(Patient $patient)
    {
        return view('Admin.patient.show', compact('patient'));

    }


    public function edit(Patient $patient)
    {
        return view('Admin.patient.edit', compact('patient'));

    }


    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $validated_data = $request->validated();
        if (is_null($validated_data['password'])) {
            unset($validated_data['password']);
            unset($validated_data['password_confirmation']);
        }
        $image_name = $this->uploadFile($request, Patient::class, $patient->user->image);
        $patient->update($validated_data);
        $patient->user->update(['image' => $image_name, 'type' => 'patient'] + $validated_data);
        return redirect()->back()->with('success', 'Patient Updated successfully');
    }


    public function destroy(Patient $patient)
    {

        $this->deleteFile($patient->user->image, Patient::UPLOAD_PATH);
        $patient->user->delete();
        // toast('Patient deleted successfully', 'success');
        return redirect()->back()->with('success', 'Patient deleted successfully');
    }
}

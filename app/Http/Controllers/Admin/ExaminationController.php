<?php

namespace App\Http\Controllers\Admin;

// use Barryvdh\DomPDF\PDF;
use PDF;
use App\Traits\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\{User, Patient, Examination, DoctorPatient};
use App\Http\Requests\Admin\Examination\{StoreExaminationRequest, UpdateExaminationRequest};


class ExaminationController extends Controller
{
    use UploadFile;

    public function index(Patient $patient)
    {
        $examinations = $patient->examinations;
        return view('Admin.examinations.index', compact('examinations', 'patient'));
    }

    public function create(Patient $patient)
    {
        return view('Admin.examinations.create', compact('patient'));
    }

    public function store(StoreExaminationRequest $request)
    {
        $doctor_patient = DoctorPatient::firstOrCreate([
            'doctor_id' => $request->validated()['doctor_id'],
            'patient_id' => $request->validated()['patient_id'],
        ]);
        $file = $this->uploadFile($request, Examination::class, input_name: 'file');
        Examination::create(['doctor_patient_id' => $doctor_patient->id, 'file' => $file] + $request->validated());
        return redirect()->back()->with('success', 'Examination Created Successfully');
    }


    public function show(Examination $examination)
    {
        $examination->load(['doctor_patient.doctor.user', 'doctor_patient.patient.user']);
        // dd($examination);
        return view('Admin.examinations.show', compact('examination'));
    }


    public function edit(Examination $examination)
    {
        return view('Admin.examinations.edit', compact('examination'));
    }


    public function update(UpdateExaminationRequest $request, Examination $examination)
    {
        $file = $this->uploadFile($request, Examination::class, input_name: 'file', old_file:$examination->file);
        $examination->update(['file' => $file] + $request->validated());
        return redirect()->back()->with('success', 'Examination Updated Successfully');
    }


    public function destroy(Examination $examination)
    {
        $this->deleteFile($examination->file, $examination::UPLOAD_PATH);
        $examination->delete();
        return redirect()->back()->with('success', 'Examination Deleted Successfully');
    }

    public function download(Examination $examination)
    {
        return response()->download(public_path($examination::UPLOAD_PATH . $examination->file), $examination->file, ['Content-Type: application/pdf']);
    }

    public function downloadPDF(Examination $examination)
    {
        $data = [
            'doctor' => $examination->doctor_patient->doctor->user->name,
            'patient' => $examination->doctor_patient->patient->user->name,
            'title' => $examination->title,
            'description' => $examination->description,
            'price' => $examination->price,
            'offer' => $examination->offer,
            'status' => $examination->status,
            'time' => $examination->time,
        ];
        $pdf = PDF::loadView('Admin.examinations.pdf', $data);
        return $pdf->download('examination_file.pdf');
    }
}

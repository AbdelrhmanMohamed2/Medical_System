<?php

namespace App\Http\Controllers\Api;

use PDF;
use App\Http\Controllers\Controller;
use App\Traits\{ApiTrait, UploadFile};
use App\Models\{DoctorPatient, Patient, Examination};
use App\Http\Requests\Admin\Examination\{StoreExaminationRequest, UpdateExaminationRequest};


class ExaminationController extends Controller
{
    use UploadFile, ApiTrait;

    public function getAllExaminations()
    {
        if (auth()->user()->type == 'Doctor') {
            $examinations = DoctorPatient::where(['doctor_id' => auth()->user()->doctor->id])->with(['examinations'])->get()->pluck('examinations')->flatten();
        } elseif (auth()->user()->type == 'Admin') {
            $examinations = Examination::get();
        }
        return $this->apiResponse(data: $examinations);
    }

    public function index(Patient $patient)
    {
        $patient->load('examinations');
        return $this->apiResponse(data: $patient);
    }

    public function store(StoreExaminationRequest $request)
    {
        $doctor_patient = DoctorPatient::firstOrCreate([
            'doctor_id' => $request->validated()['doctor_id'],
            'patient_id' => $request->validated()['patient_id'],
        ]);
        $file = $this->uploadFile($request, Examination::class, input_name: 'file');
        $examination = Examination::create(['doctor_patient_id' => $doctor_patient->id, 'file' => $file] + $request->validated());
        return $this->apiResponse(data: $examination, message: 'Examination Created Successfully');
    }

    public function show(Examination $examination)
    {
        $examination->load(['doctor_patient.doctor.user', 'doctor_patient.patient.user']);
        return $this->apiResponse(data: $examination);
    }

    public function update(UpdateExaminationRequest $request, Examination $examination)
    {
        $file = $this->uploadFile($request, Examination::class, input_name: 'file', old_file: $examination->file);
        $examination->update(['file' => $file] + $request->validated());
        return $this->apiResponse(message: 'Examination updated successfully', data: $examination);
    }

    public function destroy(Examination $examination)
    {
        $this->deleteFile($examination->file, $examination::UPLOAD_PATH);
        $examination->delete();
        return $this->apiResponse(message: 'Examination deleted successfully');
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
        $pdfContent = $pdf->output();
        return response()->make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="examination_file.pdf"'
        ]);
    }
}

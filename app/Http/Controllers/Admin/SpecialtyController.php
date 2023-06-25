<?php

namespace App\Http\Controllers\Admin;

use App\Models\Specialty;
use App\Traits\UploadFile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Specialty\{UpdateSpecialtyRequest, StoreSpecialtyRequest};

class SpecialtyController extends Controller
{
    use UploadFile;

    public function index()
    {
        $specialties = Specialty::withCount('doctors')->orderBy('doctors_count', 'desc')->paginate();
        return view('Admin.specialty.index', compact('specialties'));
    }

    public function create()
    {
        return view('Admin.specialty.create');
    }

    public function edit(Specialty $specialty)
    {
        return view('Admin.specialty.edit', compact('specialty'));
    }

    public function update(UpdateSpecialtyRequest $request, Specialty $specialty)
    {
        $image_name = $this->uploadFile($request, Specialty::class, $specialty->image);
        $specialty->update(['image' => $image_name] + $request->validated());
        // toast('Specialty Updated Successfully', 'success');
        // Alert::success('Success Title', 'Success Message');

        return redirect()->back()->with('success', 'Specialty Updated Successfully');
    }

    public function store(StoreSpecialtyRequest $request)
    {
        $image_name = $this->uploadFile($request, Specialty::class);
        Specialty::create(['image' => $image_name] + $request->validated());
        // toast('Specialty Added Successfully', 'success');
        // Alert::success('Success Title', 'Success Message');

        return redirect()->back()->with('success', 'Specialty Added Successfully');
    }

    public function destroy(Specialty $specialty)
    {
        if ($specialty->doctors->count()) {
            return redirect()->back()->with('error', 'Cant delete Specialty, Specialty Has Doctors');
        }
        $this->deleteFile($specialty->image, Specialty::UPLOAD_PATH);
        $specialty->delete();
        // toast('Specialty deleted successfully', 'success');
        return redirect()->back()->with('success', 'Specialty deleted successfully');
    }
}

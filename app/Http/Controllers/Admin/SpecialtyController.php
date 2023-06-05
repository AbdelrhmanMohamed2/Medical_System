<?php

namespace App\Http\Controllers\Admin;

use App\Models\Specialty;
use App\Traits\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSpecialtyRequest;
use App\Http\Requests\Admin\UpdateSpecialtyRequest;

class SpecialtyController extends Controller
{
    use UploadImage;

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
        $image_name = $this->uploadImage($request, Specialty::class, $specialty->image);
        $specialty->update(['image' => $image_name] + $request->validated());
        toast('Specialty Updated Successfully', 'success');
        return redirect()->back();
    }

    public function store(StoreSpecialtyRequest $request)
    {
        $image_name = $this->uploadImage($request, Specialty::class);
        Specialty::create(['image' => $image_name] + $request->validated());
        toast('Specialty Added Successfully', 'success');
        return redirect()->back();
    }

    public function destroy(Specialty $specialty)
    {
        $this->deleteImage($specialty->image, Specialty::UPLOAD_PATH);
        $specialty->delete();
        toast('Specialty deleted successfully', 'success');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\{UploadFile, ApiTrait};
use App\Http\Requests\Admin\Specialty\StoreSpecialtyRequest;
use App\Http\Requests\Admin\Specialty\UpdateSpecialtyRequest;

class SpecialtyController extends Controller
{
    use UploadFile, ApiTrait;

    public function index()
    {
        $specialties = Specialty::withCount('doctors')->orderBy('doctors_count', 'desc')->paginate(2);
        return $this->apiResponse(data: $specialties);
    }

    public function show(Specialty $specialty)
    {
        return $this->apiResponse(data: $specialty);
    }

    public function store(StoreSpecialtyRequest $request)
    {
        $image_name = $this->uploadFile($request, Specialty::class);
        $specialty = Specialty::create(['image' => $image_name] + $request->validated());
        return $this->apiResponse(message: 'Specialty Added Successfully', data: $specialty);
    }

    public function update(UpdateSpecialtyRequest $request, Specialty $specialty)
    {
        $image_name = $this->uploadFile($request, Specialty::class, $specialty->image);
        $specialty->update(['image' => $image_name] + $request->validated());
        return $this->apiResponse(message: 'Specialty Updated Successfully', data: $specialty);
    }

    public function destroy(Specialty $specialty)
    {
        if ($specialty->doctors->count()) {
            return $this->apiResponse(message: 'Specialty cant be deleted, Specialty contains Doctors');
        }
        $this->deleteFile($specialty->image, Specialty::UPLOAD_PATH);
        $specialty->delete();
        return $this->apiResponse(message: 'Specialty deleted Successfully');
    }
}

<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examination extends Model
{
    use HasFactory;

    const UPLOAD_PATH = 'uploads/examination/';

    protected $fillable = [
        'doctor_patient_id',
        'price',
        'status',
        'time',
        'title',
        'description',
        'offer',
        'file'
    ];

    public static function roles()
    {
        return [
            'price' => 'required|numeric|gt:0',
            'status' => 'required|in:pending,cancelled,success',
            'time' => 'required|date',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'offer' => 'required|numeric|gte:0|lt:100',
            // 'file' => 'required|mimes:png,jpg,pdf'
        ];
    }

    public function doctor_patient()
    {
        return $this->belongsTo(DoctorPatient::class);
    }

}

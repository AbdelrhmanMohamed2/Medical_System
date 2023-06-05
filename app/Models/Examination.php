<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examination extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_patient_id',
        'price',
        'status',
        'time',
        'title',
        'description',
        'offer'
    ];

    public function doctor_patient()
    {
        return $this->belongsTo(DoctorPatient::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}

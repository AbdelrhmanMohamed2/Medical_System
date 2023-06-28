<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPatient extends Model
{
    use HasFactory;

    protected $table = 'doctor_patient';

    protected $fillable = [
        'doctor_id',
        'patient_id',
    ];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function examinations()
    {
        return $this->hasMany(Examination::class);

    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}

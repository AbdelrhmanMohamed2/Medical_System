<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_patient_id',
        'note',
    ];

    public function doctor_patient()
    {
        return $this->belongsTo(DoctorPatient::class);
    }

}

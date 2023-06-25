<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    const UPLOAD_PATH = 'uploads/doctor/';
    protected $hidden = ['created_at', 'updated_at'];

    protected $perPage = 10;

    public static function roles()
    {
        return [
            'name' => 'required|max:50|min:5',
            'specialty_id' => 'required|exists:specialties,id',
            'description' => 'required|min:4',
        ];
    }

    protected $fillable = [
        'user_id',
        'description',
        'specialty_id'
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }

    public function notes()
    {
        return $this->hasManyThrough(Notes::class, DoctorPatient::class);
    }

    public function examinations()
    {
        return $this->hasManyThrough(Examination::class, DoctorPatient::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    const UPLOAD_PATH = 'uploads/patient/';
    protected $perPage = 5;


    protected $fillable = [
        'user_id',
        'birth_date',
        'address',
        'age',
    ];

    public static function roles()
    {
        return [

            'name' => 'required|max:50|min:5',
            'address' => 'nullable|min:3|max:50',
            'image' => 'nullable|image|mimes:png,jpg',
            'birth_date' => 'required|date|before_or_equal:'. now()->format('Y-m-d'),

        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function notes()
    {
        return $this->hasManyThrough(Note::class, DoctorPatient::class);
    }

    public function examinations()
    {
        return $this->hasManyThrough(Examination::class, DoctorPatient::class);
    }

}

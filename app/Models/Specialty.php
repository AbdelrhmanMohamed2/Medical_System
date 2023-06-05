<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialty extends Model
{
    use HasFactory;

    const UPLOAD_PATH = 'uploads/specialty/';

    const ROLES = [
        'image' => 'nullable|image|mimes:png,jpg|max:2048'
    ];

    protected $perPage = 4;

    protected $fillable = [
        'name',
        'image',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}

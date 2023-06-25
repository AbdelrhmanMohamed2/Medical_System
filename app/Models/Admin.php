<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public static function roles()
    {
        return [
            'name' => 'required|max:50|min:5',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

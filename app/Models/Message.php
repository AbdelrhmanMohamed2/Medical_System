<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $perPage = 4;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'subject',
        'content',
    ];

    public static function roles()
    {
        return [
            'user_id' => 'nullable',
            'name' => 'required_if:user_id,null|string|min:3',
            'email' => 'required_if:user_id,null|email',
            'subject' => 'required|string|min:3',
            'content' => 'required|string|min:3',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

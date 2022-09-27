<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable, HasApiTokens, HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}

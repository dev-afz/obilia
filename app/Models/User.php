<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];







    public function posted_jobs()
    {
        return $this->hasMany(Job::class, 'user_id');
    }


    public function liked_jobs()
    {
        return $this->morphMany(Like::class, 'likeable');
    }








    /*
    |--------------------------------------------------------------------------
    |scopes
    |--------------------------------------------------------------------------
    |
    | scopes are used to filter data
    |
    */


    public function scopeHasLikedJob($job_id)
    {
        return $this->liked_jobs()->where('likeable_id', $job_id)->first();
    }






    /*
    |--------------------------------------------------------------------------
    |Custom Methods
    |--------------------------------------------------------------------------
    |
    | Custom methods are used to perform some actions
    |
    */

    public function likeJob($likeable)
    {
        $this->liked_jobs()->create([
            'likeable_id' => $likeable,
        ]);
    }

    public function unlikeJob($likeable)
    {
        $this->liked_jobs()->where('likeable_id', $likeable)->delete();
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function isClient()
    {
        return $this->role === 'client';
    }
}

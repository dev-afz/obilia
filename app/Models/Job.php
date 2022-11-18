<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;

class Job extends Model
{
    use HasFactory, BelongsToThrough;

    protected $guarded = [];



    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }


    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function skills()
    {
        return $this->hasMany(JobSkill::class);
    }

    public function experience()
    {
        return $this->belongsTo(ExperienceLevel::class, 'experience_level_id');
    }

    public function work_length()
    {
        return $this->belongsTo(WorkLength::class, 'work_length_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }


    public function category()
    {
        return $this->belongsToThrough(Category::class, SubCategory::class);
    }


    public function applications()
    {
        return $this->hasMany(JobApplication::class, 'job_id');
    }



    public function invites()
    {
        return $this->hasMany(JobInvitation::class, 'job_id');
    }

    public function hired_candidates()
    {
        return $this->hasMany(JobApplication::class, 'job_id')->where('status', 'accepted');
    }


    /*
    |--------------------------------------------------------------------------
    |scopes
    |--------------------------------------------------------------------------
    */
    public function scopeActive()
    {
        return $this->where('status', 'active')
            ->whereHas('client', function ($query) {
                $query->where('status', 'active');
            });
    }


    public function scopeWithLikedByUser($user_id)
    {
        return $this->withCount([
            'likes as liked' => function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            }
        ]);
    }






    /*
    |--------------------------------------------------------------------------
    |accessors
    |--------------------------------------------------------------------------
    */

    public function getShortDescAttribute()
    {
        return substr($this->description, 0, 120) . '...';
    }
}

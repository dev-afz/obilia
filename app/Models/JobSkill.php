<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }









    /*
    |--------------------------------------------------------------------------
    |scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive()
    {
        return $this->where('status', 'active');
    }
}

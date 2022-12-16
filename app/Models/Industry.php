<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function categories()
    {
        return $this->hasMany(Category::class);
    }








    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];



    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | Relationships between models
    |
    */
    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class);
    }


    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }



    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    |
    | Scopes for queries
    |
    */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}

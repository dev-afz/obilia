<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageContract extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sender()
    {
        return $this->belongsTo(User::class, 'send_by');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'send_to');
    }

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}

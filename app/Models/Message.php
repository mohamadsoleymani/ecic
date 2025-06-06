<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subMessage()
    {
        return $this->hasMany(SubMessage::class);
    }
}

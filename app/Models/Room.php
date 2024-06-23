<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number', 'level_id', 'is_available'
    ];

    public function roomLevel()
    {
        return $this->belongsTo(RoomLevel::class, 'level_id');
    }
    
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}

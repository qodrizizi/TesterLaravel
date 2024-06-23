<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'room_id'
    ];

    // Relasi dengan model Room (satu pasien hanya bisa berada di satu kamar)
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'level', 'is_available'
    ];

    // Relasi dengan model Patient (satu kamar bisa memiliki banyak pasien)
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}

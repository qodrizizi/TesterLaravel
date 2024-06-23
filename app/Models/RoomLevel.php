<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomLevel extends Model
{
    protected $fillable = [
        'name'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}

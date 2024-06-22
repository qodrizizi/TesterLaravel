<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        return Room::with('level')->get();
    }

    public function updateAvailability($id)
    {
        $room = Room::findOrFail($id);
        $room->is_available = !$room->is_available;
        $room->save();

        return response()->json(['message' => 'Room availability updated successfully']);
    }
}

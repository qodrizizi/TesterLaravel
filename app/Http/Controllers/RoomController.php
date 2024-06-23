<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomLevel; 

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }

    public function store(Request $request)
    {
        $room = new Room();
        $room->room_number = $request->room_number;
        $room->level_id = $request->level_id;
        $room->is_available = $request->is_available ?? true;

        $room->save();

        return response()->json(['message' => 'Room created successfully', 'room' => $room]);
    }

    public function show($id)
    {
        $room = Room::findOrFail($id);
        return response()->json($room);
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $room->room_number = $request->room_number;
        $room->level_id = $request->level_id;
        $room->is_available = $request->is_available ?? true;

        $room->save();

        return response()->json(['message' => 'Room updated successfully', 'room' => $room]);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return response()->json(['message' => 'Room deleted successfully']);
    }

    public function updateAvailability($id)
    {
        $room = Room::findOrFail($id);
        $room->is_available = !$room->is_available;
        $room->save();

        return response()->json(['message' => 'Room availability updated successfully', 'room' => $room]);
    }
}

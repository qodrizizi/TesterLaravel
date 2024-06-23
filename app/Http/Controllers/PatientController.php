<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Room;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'room_id' => 'required|exists:rooms,id',
        ]);

        $patient = new Patient();
        $patient->name = $request->name;
        $patient->room_id = $request->room_id;

        $room = Room::findOrFail($request->room_id);
        if (!$room->is_available) {
            return response()->json(['message' => 'Room is not available'], 400);
        }

        $room->is_available = false; 
        $room->save();

        $patient->save();

        return response()->json(['message' => 'Patient admitted successfully', 'patient' => $patient]);
    }
    public function discharge($id)
    {

        $patient = Patient::findOrFail($id);

        $room = Room::findOrFail($patient->room_id);
        $room->is_available = true; 
        $room->save();


        $patient->delete();

        return response()->json(['message' => 'Patient discharged successfully']);
    }
}

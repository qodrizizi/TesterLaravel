<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Room;

class PatientController extends Controller
{
    public function store(Request $request)
    {
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->admission_date = now();
        $patient->room_id = $request->room_id;

        $room = Room::findOrFail($request->room_id);
        if (!$room->is_available) {
            return response()->json(['message' => 'Room is not available'], 400);
        }

        $room->is_available = false;
        $room->save();

        $patient->save();

        return response()->json(['message' => 'Patient admitted successfully']);
    }

    public function discharge($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->discharge_date = now();

        $room = Room::findOrFail($patient->room_id);
        $room->is_available = true;
        $room->save();

        $patient->save();

        return response()->json(['message' => 'Patient discharged successfully']);
    }
}


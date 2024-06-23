<?php
namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $rooms = Room::where('is_available', true)->get();
        return view('patients.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $patient = Patient::create($request->all());
        $room = Room::find($patient->room_id);
        $room->is_available = false;
        $room->save();
        
        return redirect()->route('patients.index');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        $rooms = Room::where('is_available', true)->orWhere('id', $patient->room_id)->get();
        return view('patients.edit', compact('patient', 'rooms'));
    }

    public function update(Request $request, Patient $patient)
    {
        $oldRoom = $patient->room;
        $patient->update($request->all());
        $newRoom = Room::find($patient->room_id);

        if ($oldRoom->id !== $newRoom->id) {
            $oldRoom->is_available = true;
            $oldRoom->save();
            $newRoom->is_available = false;
            $newRoom->save();
        }

        return redirect()->route('patients.index');
    }

    public function destroy(Patient $patient)
    {
        $room = $patient->room;
        $patient->delete();
        $room->is_available = true;
        $room->save();

        return redirect()->route('patients.index');
    }
}

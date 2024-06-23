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
        // Validasi data yang diterima dari request
        $request->validate([
            'name' => 'required|string|max:255',
            'room_id' => 'required|exists:rooms,id',
        ]);

        // Buat objek pasien baru
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->admission_date = now(); // Tanggal masuk
        $patient->room_id = $request->room_id;

        // Ubah status ketersediaan kamar
        $room = Room::findOrFail($request->room_id);
        if (!$room->is_available) {
            return response()->json(['message' => 'Room is not available'], 400);
        }

        $room->is_available = false; // Tandai kamar tidak tersedia
        $room->save();

        // Simpan data pasien
        $patient->save();

        return response()->json(['message' => 'Patient admitted successfully', 'patient' => $patient]);
    }

    public function discharge($id)
    {
        // Cari pasien berdasarkan ID
        $patient = Patient::findOrFail($id);

        // Validasi apakah pasien sudah pulang sebelumnya
        if (!is_null($patient->discharge_date)) {
            return response()->json(['message' => 'Patient has already been discharged'], 400);
        }

        // Tandai tanggal keluar pasien
        $patient->discharge_date = now();

        // Ubah status ketersediaan kamar
        $room = Room::findOrFail($patient->room_id);
        $room->is_available = true; // Tandai kamar tersedia kembali
        $room->save();

        // Simpan data pasien
        $patient->save();

        return response()->json(['message' => 'Patient discharged successfully', 'patient' => $patient]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\Room;

class PatientSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID dari beberapa kamar
        $room1 = Room::where('room_number', '101')->first()->id;
        $room2 = Room::where('room_number', '102')->first()->id;

        // Buat beberapa data pasien
        Patient::create(['name' => 'John Doe', 'admission_date' => now(), 'room_id' => $room1]);
        Patient::create(['name' => 'Jane Doe', 'admission_date' => now(), 'room_id' => $room2]);
        // Tambahkan data pasien lainnya sesuai kebutuhan
    }
}


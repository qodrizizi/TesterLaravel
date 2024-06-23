<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\RoomLevel;

class RoomSeeder extends Seeder
{
    public function run()
    {
        // Ambil ID dari level kamar
        $level1 = RoomLevel::where('name', 'VIP')->first()->id;
        $level2 = RoomLevel::where('name', 'Kelas 1')->first()->id;
        $level3 = RoomLevel::where('name', 'Kelas 2')->first()->id;

        // Buat beberapa data kamar
        Room::create(['room_number' => '101', 'level_id' => $level1, 'is_available' => true]);
        Room::create(['room_number' => '102', 'level_id' => $level2, 'is_available' => true]);
        Room::create(['room_number' => '103', 'level_id' => $level3, 'is_available' => true]);
        // Tambahkan data kamar lainnya sesuai kebutuhan
    }
}

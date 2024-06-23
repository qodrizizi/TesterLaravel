<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoomLevel;

class RoomLevelSeeder extends Seeder
{
    public function run()
    {
        RoomLevel::create(['name' => 'VIP']);
        RoomLevel::create(['name' => 'Kelas 1']);
        RoomLevel::create(['name' => 'Kelas 2']);
        // Tambahkan level kamar lainnya sesuai kebutuhan
    }
}

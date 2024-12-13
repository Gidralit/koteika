<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\Equipment;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::factory()
            ->count(6)
            ->create()
            ->each(function ($room){
                $equipmentIds = Equipment::inRandomOrder()->limit(3)->pluck('id')->toArray();
                $room->equipment()->attach($equipmentIds);
            });
    }



}

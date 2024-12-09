<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        DB::table('reservation')->insert([
            [
                'user_id' => 1,
                'room_id' => 1,
                'check_in_date' => '2023-10-01',
                'check_out_date' => '2023-10-02',
                'price' => 100.00,
                'description' => 'Бронирование на одну ночь.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

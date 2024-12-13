<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**php z
     * Seed the application's database.
     */
    public function run(): void
    {
        $this ->call(HeadersTableSeeder::class);
        $this -> call(ContactsTableSeeder::class);
        $this -> call(UsersSeeder::class);
        $this -> call(EquipmentTableSeeder::class);
        $this -> call(RoomSeeder::class);
        $this -> call(ReservationSeeder::class);
        $this -> call(ReviewSeeder::class);
    }
}

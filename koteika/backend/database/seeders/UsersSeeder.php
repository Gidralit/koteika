<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "admin",
            "email" => "admin@admin.com",
            "password" => "admin",
            "avatar" => "",
            "phone" => "+1(111)111-11-11",
            "role" => "admin",
        ]);
    }
}

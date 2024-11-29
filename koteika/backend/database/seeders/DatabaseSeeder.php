<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\HeadersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**php z
     * Seed the application's database.
     */
    public function run(): void
    {
        $this ->call(HeadersTableSeeder::class);
    }
}

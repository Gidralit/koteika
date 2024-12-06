<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Header;

class HeadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Header::create([
            'title' => 'Котейка',
            'text' => 'Пушистые мечты',
            'city' => 'Москва',
        ]);
    }
}

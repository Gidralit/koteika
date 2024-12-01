<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'name' => 'Номер №1',
            'width' => 4,
            'height' => 3,
            'length' => 2,
            'equipment' => 'будка, лоток',
            'photo_path' => 'Пхото нету'
        ]);
        Room::create([
            'name' => 'Номер №2',
            'width' => 6,
            'height' => 5,
            'length' => 1,
            'equipment' => 'будка, лоток, кровать',
            'photo_path' => 'Пхото нету'
        ]);
        Room::create([
            'name' => 'Номер №3',
            'width' => 2,
            'height' => 2,
            'length' => 2,
            'equipment' => 'лоток',
            'photo_path' => 'Пхото нету'
        ]);
        Room::create([
            'name' => 'Номер №4',
            'width' => 4,
            'height' => 4,
            'length' => 4,
            'equipment' => 'будка',
            'photo_path' => 'Пхото нету'
        ]);
        Room::create([
            'name' => 'Номер №5',
            'width' => 5,
            'height' => 5,
            'length' => 5,
            'equipment' => 'будка, будка, лоток, лоток',
            'photo_path' => 'Пхото нету'
        ]);
        Room::create([
            'name' => 'Номер №6',
            'width' => 6,
            'height' => 6,
            'length' => 6,
            'equipment' => 'будка, будка, будка, лоток, лоток, лоток, миска, миска, миска',
            'photo_path' => 'Пхото нету'
        ]);
    }
}

<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition(): array
    {
        $photosPaths = [
            'photosRooms/номер1.jpeg',
            'photosRooms/номер2.jpeg',
            'photosRooms/номер3.jpeg',
            'photosRooms/номер4.jpeg',
            'photosRooms/номер5.jpeg',
            'photosRooms/номер6.jpeg',
        ];

        shuffle($photosPaths);
        return [
            'name' => $this->faker->unique()->sentence(2),
            'square' => $this->faker->numberBetween(10, 100),
            'photo_path1' => $photosPaths[0],
            'photo_path2' => $photosPaths[1],
            'photo_path3' => $photosPaths[2],
            'photo_path4' => $photosPaths[3],
            'photo_path5' => $photosPaths[4],
            'price' => $this->faker->numberBetween(100, 1000),
            'show_on_homepage' => $this->faker->boolean
        ];
    }
}

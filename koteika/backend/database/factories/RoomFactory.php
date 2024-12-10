<?php

namespace Database\Factories;

use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    protected $model = Room::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->sentence(2),
            'width' => $this->faker->randomFloat(2, 1, 10),
            'height' => $this->faker->randomFloat(2, 1, 10),
            'length' => $this->faker->randomFloat(2, 1, 10),
            'status' => $this->faker->randomElement(['show', 'no_show']),
            'photo_path' => '',
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}

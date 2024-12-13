<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reviews>
 */
class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'reservation_id' => Reservation::factory(),
            'title' => $this->faker->sentence,
            'content' => $this->faker->text(200),
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}

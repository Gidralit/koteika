<?php

namespace Database\Factories;

use App\Models\Review;
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
            'avatar' => '0_0',
            'email' => $this->faker->unique()->safeEmail(),
            'title' => $this->faker->unique()->sentence(),
            'content' => $this->faker->text(200),
            'rating' => $this->faker->numberBetween(1, 5)
        ];
    }
}

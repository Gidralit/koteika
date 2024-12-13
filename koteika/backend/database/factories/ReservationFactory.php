<?php
namespace Database\Factories;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition(): array
    {
        return [
            'pets_count' => $this->faker->numberBetween(0, 5),
            'user_id' => User::factory(),
            'room_id' => 1,
            'check_in_date' => $this->faker->date(),
            'check_out_date' => $this->faker->date(),
            'pets_names' => $this->faker->optional()->words(3, true),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'status' => $this->faker->randomElement(['pending', 'approved']),
        ];
    }
}

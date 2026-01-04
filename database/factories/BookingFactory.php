<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Booking;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        return [
            'tour_date' => $this->faker->dateTimeBetween('-30 days', '+30 days')->format('Y-m-d'),
            'start_time' => $this->faker->time('H:i:s'),
            'duration' => $this->faker->randomElement(['2 hours', '4 hours', '1 day']),
            'num_people' => $this->faker->numberBetween(1, 6),
            'service_type' => $this->faker->randomElement(['city tour', 'day trip', 'food tour']),
            'special_requests' => $this->faker->boolean(30) ? $this->faker->sentence() : null,
            'total_price' => $this->faker->randomFloat(2, 30, 400),
            'status' => $this->faker->randomElement(['pending','confirmed','completed']),
            'payment_status' => $this->faker->randomElement(['pending','paid']),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'rating' => $this->faker->numberBetween(3, 5),
            'title' => $this->faker->boolean(60) ? $this->faker->sentence(4) : null,
            'review' => $this->faker->paragraph(),
            'tour_type' => $this->faker->randomElement(['City Tour','Silk Road','Food Tour','Cultural Tour']),
            'helpful_count' => $this->faker->numberBetween(0, 20),
            'status' => 'approved',
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Guide;

class GuideFactory extends Factory
{
    protected $model = Guide::class;

    public function definition(): array
    {
        return [
            'title' => 'Licensed Local Guide',
            'tagline' => $this->faker->sentence(6),
            'location' => $this->faker->city(),
            'rating' => 0,
            'reviews_count' => 0,
            'tours_completed' => $this->faker->numberBetween(0, 80),
            'experience_years' => $this->faker->numberBetween(1, 12),
            'hourly_rate' => $this->faker->randomFloat(2, 10, 60),
            'daily_rate' => $this->faker->randomFloat(2, 80, 250),
            'description' => $this->faker->paragraphs(2, true),
            'license_number' => strtoupper($this->faker->bothify('UZ-####-??')),
            'verified' => $this->faker->boolean(40),
            'available' => 1,
            'status' => 'online',
        ];
    }
}

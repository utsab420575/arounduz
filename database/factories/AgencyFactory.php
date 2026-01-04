<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Agency;

class AgencyFactory extends Factory
{
    protected $model = Agency::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'tagline' => $this->faker->sentence(6),
            'type' => 'Inbound Travel Agency',
            'established' => $this->faker->numberBetween(2005, 2023),
            'location' => $this->faker->city(),
            'rating' => 0,
            'reviews_count' => 0,
            'tours_completed' => $this->faker->numberBetween(0, 200),
            'phone' => $this->faker->e164PhoneNumber(),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'description' => $this->faker->paragraphs(2, true),
            'license_number' => strtoupper($this->faker->bothify('AG-####-??')),
            'verified' => $this->faker->boolean(50),
            'status' => 'online',
        ];
    }
}

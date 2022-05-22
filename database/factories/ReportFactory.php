<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'company_name' => $this->faker->company(),
            'phone' => $this->faker->phoneNumber,
            'country' => $this->faker->country(),
            'details' => $this->faker->sentence(),
        ];
    }
}

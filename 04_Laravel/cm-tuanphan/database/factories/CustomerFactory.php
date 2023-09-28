<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->text(50),
            'transaction_name' => strtoupper(fake()->text(20)),
            'address' => fake()->text(50),
            'email' => fake()->safeEmail,
            'phone_number' => $this->faker->numerify('##########'),
            'fax' => $this->faker->numerify('##########'),
        ];
    }
}

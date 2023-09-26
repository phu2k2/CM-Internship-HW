<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

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
            'company_name' => fake()->company(),
            'transaction_name' => strtoupper(fake()->state()),
            'address' => fake()->city(),
            'email' => fake()->unique()->companyEmail(),
            'phone' => fake()->phoneNumber(15),
            'fax' => fake()->ssn()
        ];
    }
}

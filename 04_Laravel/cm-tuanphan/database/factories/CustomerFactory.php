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
            'company_name' => fake('vi_VN')->company(),
            'transaction_name' => strtoupper(fake()->text(20)),
            'address' => fake('vi_VN')->city() . "  " . fake('vi_VN')->province(),
            'email' => fake()->unique()->companyEmail(),
            'phone_number' => fake()->numerify('##########'),
            'fax' => fake()->numerify('##########'),
        ];
    }
}

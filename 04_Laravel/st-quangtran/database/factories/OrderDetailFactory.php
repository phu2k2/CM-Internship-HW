<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $invoice_id = Order::all()->random();
        $product_id = Product::all()->random();

        return [
            'invoice_id' => $invoice_id,
            'product_id' => $product_id->product_id,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'amount' => $this->faker->numberBetween(1, 100),
            'discount' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}

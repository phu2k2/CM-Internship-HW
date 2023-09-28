<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orderdetail>
 */
class OrderdetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = [];
        $invoices = Order::all();
        $products = Product::all();
        foreach ($invoices as $key => $invoice) {
            foreach ($products as $key => $product) {
                $data[] = $invoice->id . '-' . $product->product_id;
            }
        }
        $random = fake()->unique()->randomElement($data);
        $foreign = explode('-', $random);
        return [
            'invoice_id' => $foreign[0],
            'product_id' => $foreign[1],
            'price' => fake()->randomNumber(5, false),
            'amount' => fake()->numberBetween(1, 4000),
            'discount' => fake()->numberBetween(0, 4000)
        ];
    }
}

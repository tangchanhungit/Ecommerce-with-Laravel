<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrderDetail;
use App\Models\Product;

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

    protected $model = OrderDetail::class;
    public function definition(): array
    {

        $product = Product::inRandomOrder()->first();
        $quantity = $this->faker->numberBetween(1, 5);
        $unitPrice = $this->faker->randomFloat(2, 5, 100);
        $totalPrice = $quantity * $unitPrice;

        return [
            //
            'product_name' => $product ? $product->product_name : $this->faker->word,
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice,
            'order_id' => Order::factory(),
            'product_id' => $product ? $product->id : Product::factory(),
        ];
    }
}

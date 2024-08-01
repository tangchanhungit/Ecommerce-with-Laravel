<?php

namespace Database\Seeders\Orders;

use Illuminate\Database\Seeder;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $products = Product::all();

        if ($orders->isEmpty() || $products->isEmpty()) {
            $this->command->info('No orders or products found. Seed orders and products first.');
            return;
        }

        foreach ($orders as $order) {
            foreach ($products->random(3) as $product) { // Assuming each order should have 3 products
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->product_name,
                    'quantity' => rand(1, 5),
                    'unit_price' => $product->price,
                    'total_price' => rand(1, 5) * $product->price,
                ]);
            }
        }
    }
}

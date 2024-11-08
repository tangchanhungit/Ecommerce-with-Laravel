<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            //
            'product_name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'stock' => $this->faker->randomFloat(2, 1,100),
            'image' => 'frontend/images/products/' . $this->faker->image(public_path('frontend/images/products'), 500, 500, null, false),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}

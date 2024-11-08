<?php

namespace Database\Seeders\Products;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $categories = Category::all();

        foreach ($products as $product) {
            // Attach a random number of categories to each product
            $product->category()->attach(
                $categories->random(1)->pluck('id')->toArray()
            );
        }
        
    }
}

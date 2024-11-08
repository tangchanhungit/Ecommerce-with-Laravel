<?php

namespace App\Repositories;

use App\Repositories\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        return Product::paginate(10);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function getById($id)
    {
        return Product::findOrFail($id);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }
}

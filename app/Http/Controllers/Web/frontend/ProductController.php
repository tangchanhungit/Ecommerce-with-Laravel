<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function products(Request $request)
    {
        $categories = Category::all();
        $category_id = $request->query('category');
    
        if ($category_id) {
            $products = Product::whereHas('category', function($query) use ($category_id) {
                $query->where('categories.id', $category_id);
            })->paginate(12);
        } else {
            $products = Product::paginate(12);
        }
    
        return view('frontend.shop', compact('categories', 'products'));
    }

    public function infoProduct($id){
        $product = Product::findOrFail($id);
        return view('frontend.productDetail', compact('product'));
    }
}

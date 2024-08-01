<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function products($category = null)
    {
        $categories = Category::all();

        if ($category) {
            $products = Product::where('category_id', $category)->get();
        } else {
            $products = Product::all();
        }

        $products = Product::paginate(12);


        return view('frontend.shop', compact('categories', 'category', 'products'));
    }

    public function about(){
        return view('frontend.about');
    }

    public function cart(){
        return view('frontend.cart');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function checkOut(){
        return view('frontend.checkout');
    }

    public function blog(){
        return view('frontend.blog');
    }

}

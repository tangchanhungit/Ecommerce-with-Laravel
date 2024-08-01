<?php

namespace App\Http\Controllers;
use App\Models\Product;


class HomeController extends Controller
{
    //
    public function home(){
        $products = Product::take(8)->get();

        return view('frontend.index', compact('products'));
    }

    public function adminHome(){
        return view("backend.index");
    }
}

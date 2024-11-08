<?php

namespace App\Http\Controllers\Web\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class IndexController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository){
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAll();
        return view('frontend.index',compact('products'));
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

    public function infoProduct($id){
        $product = $this->productRepository->getById($id);
        return view('frontend.productDetail', compact('product'));
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

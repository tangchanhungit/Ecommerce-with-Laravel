<?php

namespace App\Http\Controllers\Web\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function showCreateForm()
    {
        return view('backend.products.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $this->productRepository->create($request->all());

        return redirect()->route('admin.products.list')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = $this->productRepository->getById($id);
        return view('backend.products.show', compact('product'));
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);

        return redirect()->route('admin.products.list')->with('success', 'Product deleted successfully.');
    }

    public function index()
    {
        $products = $this->productRepository->getAll();
        return view('backend.products.list', compact('products'));
    }
}

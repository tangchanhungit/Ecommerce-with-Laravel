<?php

namespace App\Http\Controllers\Web\backend;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function showCreateForm(){
        return view("backend.orders.add");
    }

    public function index(Request $request)
    {
        $data = $this->orderRepository->getAll($request);
        return view('backend.orders.index', $data);
    }

    public function create(Request $request)
    {
        $order = $this->orderRepository->createOrder($request->all());

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function showOrderDetails($orderId)
    {
        $orderDetails = $this->orderRepository->getOrderDetails($orderId);

        return view('backend.orders.show', compact('orderDetails'));
    }
}


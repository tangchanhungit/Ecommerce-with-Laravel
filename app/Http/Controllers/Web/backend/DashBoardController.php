<?php

namespace App\Http\Controllers\Web\backend;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    protected $userRepository, $orderRepository, $productRepository;

    public function __construct(OrderRepositoryInterface $orderRepository, ProductRepositoryInterface $productRepository,
                                UserRepositoryInterface $userRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
    }
    //
    public function index(Request $request)
    {
        $newOrders = $this->orderRepository->getNewOrdersCount();
        $bounceRate = 53; // This might be calculated differently
        $userRegistrations = $this->userRepository->getUserRegistrationsCount();
        // $uniqueVisitors = Visitor::count(); // Assuming you have a Visitor model

        return view('backend.index', compact('newOrders', 'bounceRate', 'userRegistrations'));
    }

    
}

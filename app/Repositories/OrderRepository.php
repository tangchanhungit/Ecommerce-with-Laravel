<?php

namespace App\Repositories;

use App\Repositories\OrderRepositoryInterface;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderRepository implements OrderRepositoryInterface
{
    public function getNewOrdersCount()
    {
        return Order::whereDate('created_at', now()->toDateString())->count();
    }

    public function getAll(Request $request)
    {
        $statuses = Order::STATUSES;
        $paymentMethods = Order::PAYMENT_METHOD;
    
        $query = Order::query();
    
        $search = $request->input('search');
        $status = $request->input('status');
        $paymentMethod = $request->input('payment_method');
    
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%");
            });
        }
    
        if ($status !== null) {
            $query->where('status', $status);
        }
    
        if ($paymentMethod !== null) {
            $query->where('payment_method', $paymentMethod);
        }
    
        $orders = $query->paginate(10);
    
        return [
            'orders' => $orders,
            'statuses' => $statuses,
            'paymentMethods' => $paymentMethods,
        ];
    }

    public function createOrder(array $data)
    {
        $validatedData = $this->validateOrderData($data);

        $order = Order::create([
            'order_number' => $data['order_number'],
            'user_id' => $validatedData['user_id'], 
            'status' => $validatedData['status'], 
            'payment_method' => $validatedData['payment_method'],
        ]);
        return $order;
    }
    public function validateOrderData(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'exists:users,id'],
            'status' => ['required', 'string'],
            'payment_method' => ['required', 'string'],
        ])->validate();
    }

    public function getOrderDetails($orderId)
    {
        return OrderDetail::where('order_id', $orderId)->get();
    }
}

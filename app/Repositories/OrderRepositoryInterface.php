<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface OrderRepositoryInterface
{
    public function getNewOrdersCount();
    public function getAll(Request $request);
    public function createOrder(array $data);
    public function getOrderDetails($orderId);
    public function validateOrderData(array $data);

}

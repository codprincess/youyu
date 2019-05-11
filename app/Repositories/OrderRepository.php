<?php


namespace App\Repositories;


use App\Models\Order;

class OrderRepository
{
    public function getOrderList(Order $order)
    {
        $orderList = Order::all();
        return $orderList;
    }
}
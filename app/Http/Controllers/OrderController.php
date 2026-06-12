<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function startDelivery(Order $order)
    {
        $order->update([
            'delivery_status' => 'START',
        ]);
        return redirect()->route('orders.index');
    }

    public function deliveryConfirmed(Order $order)
    {
        $order->update([
            'delivery_status' => 'DELIVERED',
        ]);
        return redirect()->route('orders.index');
    }

    public function index(){
        $orders = Order::with('client')->get();
        return view('order.index',compact('orders'));
    }
}

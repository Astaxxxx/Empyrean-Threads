<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderForProductController extends Controller
{
    //

    public function index(){
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.orders.main', ['orders' => $orders]);
    }

    public function view($id){
        $states =['pending', 'shipped', 'cancelled'];
        $order = Order::with('user', 'items', 'items.product', 'items.colour')->findOrFail($id);
        return view('admin.pages.orders.view', ['order' => $order, 'states' => $states]);
    }


}

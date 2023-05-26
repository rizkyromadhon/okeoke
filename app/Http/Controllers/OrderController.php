<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index () {
        $pending_orders = Order::where('status', 'pending')->latest()->get();
        return view('admin.order.pendingorders', compact('pending_orders'), [
            'title' => 'Pending Orders Page'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,processing,on_hold,completed,cancelled,refunded,failed',
    ]);

    $order = \App\Models\Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
}

    public function show($id)
    {
        $order = \App\Models\Order::with('details')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function index()
    {
        $orders = \App\Models\Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }
}
}

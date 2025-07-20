<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function orderTrack()
    {
        return view('user.order.track');
    }

    public function orderTrackCheck(Request $request)
    {
        $request->validate([
            'order_number' => 'required',
            'email' => 'required|email',
        ]);

        $order = Order::with(['orderDetails.product', 'billingAddress', 'shippingAddress'])
            ->where('order_number', $request->order_number)
            ->whereHas('user', function ($query) use ($request) {
                $query->where('email', $request->email);
            })
            ->first();

        if (!$order) {
            return redirect()->back()->withErrors(['Order not found. Please check your details.']);
        }

        return view('user.order.track-order-details', compact('order'));
    }
}

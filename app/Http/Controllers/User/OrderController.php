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
            'order_id' => 'required|exists:orders,order_id',
            'email' => 'required|email|exists:user,email',
        ]);

        $order = Order::where('order_id', $request->order_id)->firstOrFail();

        return view('user.pages.order.track_result', compact('order'));
    }
}

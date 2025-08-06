<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->with('orderDetails')->get();

        return view('user.user.orders', compact('orders'));
    }



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


    public function orderDetail($id)
    {
        $id = decrypt($id);

        $order = Order::with(['orderDetails.product'])
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$order) {
            abort(404);
        }

        return view('user.user.order', compact('order'));
    }
}

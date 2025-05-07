<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->where(function ($query) {
            if (Auth::check()) {
                $query->where('user_id', Auth::id());
            } else {
                $query->where('device_id', request()->cookie('device_id'));
            }
        })->get();

        $subtotal = $cartItems->sum(function ($item) {
            return $item->qty * $item->price;
        });

        return view('cart.index', compact('cartItems', 'subtotal'));
    }

    public  function addToCart(Request $request)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        $deviceId = $userId ? null : $request->cookie('device_id') ?? Str::uuid();

        $product = Product::findOrFail($request->product_id);

        // Check if cart item already exists
        $cartItem = Cart::where('product_id', $product->id)
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when(!$userId, fn($q) => $q->where('device_id', $deviceId))
            ->first();

        if ($cartItem) {
            $cartItem->qty += $request->qty;
            $cartItem->save();
        } else {
            Cart::create([
                'product_id' => $product->id,
                'qty' => $request->qty,
                'price' => $product->sale_price ?? $product->price,
                'user_id' => $userId,
                'device_id' => $deviceId,
                'device_type' => $request->header('User-Agent'),
            ]);
        }

        $response = ['success' => true];

        // If guest, set device_id cookie
        if (!$userId && !$request->cookie('device_id')) {
            return response()->json($response)->cookie('device_id', $deviceId, 60 * 24 * 30); // 30 days
        }

        return response()->json($response);
    }
    public function removeCart($id)
    {
        $cart = Cart::findOrFail($id);

        if (
            (Auth::check() && $cart->user_id == Auth::id()) ||
            (!Auth::check() && $cart->device_id == request()->cookie('device_id'))
        ) {
            $cart->delete();
        }

        return redirect()->back();
    }
    public function fetchMiniCart()
    {
        $userId = Auth::id();
        $deviceId = request()->cookie('device_id');

        $carts = Cart::with('product.images')
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when(!$userId, fn($q) => $q->where('device_id', $deviceId))
            ->where('status', 'active')
            ->get();

        $cartCount = $carts->sum('qty');
        $cartSubtotal = $carts->sum(fn($item) => $item->price * $item->qty);

        $html = view('partials.header-cart', compact('carts', 'cartCount', 'cartSubtotal'))->render();

        return response()->json([
            'success' => true,
            'html' => $html,
        ]);
    }
}

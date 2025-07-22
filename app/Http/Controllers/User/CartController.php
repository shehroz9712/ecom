<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductVariant;
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

        return view('user.cart.index', compact('cartItems', 'subtotal'));
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'variant_id' => 'nullable|exists:product_variants,id',
        ]);

        $userId = Auth::guard('web')->id();
        $deviceId = $userId ? null : ($request->cookie('device_id') ?? (string) Str::uuid());

        $product = Product::findOrFail($request->product_id);

        $variant = null;
        $finalPrice = $product->price;

        if ($request->filled('variant_id')) {
            $variant = ProductVariant::findOrFail($request->variant_id);
            $finalPrice = $variant->sale_price ?? $variant->price;
        }

        $cartItemQuery = Cart::where('product_id', $product->id)
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when(!$userId, fn($q) => $q->where('device_id', $deviceId));

        if ($request->filled('variant_id')) {
            $cartItemQuery->where('variant_id', $request->variant_id);
        }

        $cartItem = $cartItemQuery->first();

        if ($cartItem) {
            $cartItem->qty += $request->qty;
            $cartItem->save();
        } else {
            $cartItem = Cart::create([
                'product_id' => $product->id,
                'qty' => $request->qty,
                'price' => $finalPrice,
                'user_id' => $userId,
                'device_id' => $deviceId,
                'device_type' => $request->header('User-Agent'),
                'variant_id' => $request->variant_id,
            ]);
        }

        $response = ['success' => true, 'message' => 'Product added to cart', 'cartItem' => $cartItem];

        if (!$userId && !$request->cookie('device_id')) {
            return response()->json($response)->cookie('device_id', $deviceId, 60 * 24 * 30);
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

    public function checkout()
    {

        $cartItems = Cart::with(['product', 'variant.attributes.attributeValue'])->where('user_id', auth()->id())->get();

        return view('user.cart.checkout', compact('cartItems'));
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'qty' => 'required|integer|min:1',
        ]);

        $cart = Cart::findOrFail($request->cart_id);
        $cart->qty = $request->qty;
        $cart->save();

        // Recalculate subtotal for the current user
        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->get();

        $newSubtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });

        // Load settings (like shipping)
        $settings = \App\Models\Setting::first(); // or use cache if needed

        return response()->json([
            'success' => true,
            'item_subtotal' => number_format($cart->price * $cart->qty, 2),
            'subtotal' => number_format($newSubtotal, 2),
            'total' => number_format($newSubtotal + $settings->shipping, 2),
        ]);
    }

    function clearCart()
    {
        $userId = Auth::id();
        $deviceId = request()->cookie('device_id');

        Cart::where(function ($query) use ($userId, $deviceId) {
            if ($userId) {
                $query->where('user_id', $userId);
            } else {
                $query->where('device_id', $deviceId);
            }
        })->delete();

        return redirect()->route('user.cart')->with('success', 'Cart cleared successfully.');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Setting;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
        $deviceId = $request->cookie('device_id') ?? (string) Str::uuid();

        $product = Product::findOrFail($request->product_id);
        $variant = null;
        $finalPrice = $product->price;

        if ($request->filled('variant_id')) {
            $variant = ProductVariant::findOrFail($request->variant_id);
            $finalPrice = $variant->sale_price ?? $variant->price;
        }

        $cartItemQuery = Cart::where('product_id', $product->id)
            ->where('status', 'active')
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when(!$userId, fn($q) => $q->where('device_id', $deviceId));

        if ($request->filled('variant_id')) {
            $cartItemQuery->where('variant_id', $request->variant_id);
        } else {
            $cartItemQuery->whereNull('variant_id');
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
                'user_id' => $userId ?? null,
                'device_id' => $deviceId,
                'device_type' => $request->header('User-Agent'),
                'variant_id' => $request->variant_id,
                'created_by' => $userId ?? null,
                'status' => 'active',
            ]);
        }

        $response = [
            'success' => true,
            'message' => 'Product added to cart',
            'cartItem' => $cartItem
        ];

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


    public function updateCart(Request $request)
    {
        $request->validate([
            'cart_id' => 'required|exists:carts,id',
            'qty' => 'required|integer|min:1',
        ]);

        $cart = Cart::findOrFail($request->cart_id);
        $cart->qty = $request->qty;
        $cart->save();

        $userId = auth()->id();
        $cartItems = Cart::where('user_id', $userId)->get();

        $newSubtotal = $cartItems->sum(function ($item) {
            return $item->price * $item->qty;
        });

        return response()->json([
            'success' => true,
            'item_subtotal' => number_format($cart->price * $cart->qty, 2),
            'subtotal' => number_format($newSubtotal, 2),
            'total' => number_format($newSubtotal, 2),
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

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $code = trim($request->code);

        $userId   = auth('web')->id();
        $deviceId = $request->cookie('device_id');

        $cartQuery = Cart::with('product')
            ->where('status', 'active')
            ->where(function ($q) use ($userId, $deviceId) {
                if ($userId) {
                    $q->where('user_id', $userId);
                } elseif ($deviceId) {
                    $q->where('device_id', $deviceId);
                } else {
                    $q->whereRaw('1=0');
                }
            });

        $cartItems = $cartQuery->get();

        if ($cartItems->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Your cart is empty.',
            ], 422);
        }

        $subtotal = $cartItems->sum(fn($i) => (float)$i->price * (int)$i->qty);

        $coupon = coupon::where('code', $code)->first();

        if (!$coupon) {
            return response()->json(['success' => false, 'message' => 'Invalid coupon code.'], 422);
        }

        if ($coupon->status !== 'active') {
            return response()->json(['success' => false, 'message' => 'Coupon is not active.'], 422);
        }

        $today = now()->startOfDay();
        if ($coupon->start_date && $today->lt(\Illuminate\Support\Carbon::parse($coupon->start_date)->startOfDay())) {
            return response()->json(['success' => false, 'message' => 'Coupon is not yet valid.'], 422);
        }
        if ($coupon->end_date && $today->gt(\Illuminate\Support\Carbon::parse($coupon->end_date)->endOfDay())) {
            return response()->json(['success' => false, 'message' => 'Coupon has expired.'], 422);
        }

        $isGuest = !$userId;
        if ($isGuest && !$coupon->is_for_guest) {
            return response()->json(['success' => false, 'message' => 'This coupon is only for registered users.'], 422);
        }

        if ($coupon->min_spend > 0 && $subtotal < (float)$coupon->min_spend) {
            return response()->json([
                'success' => false,
                'message' => 'Minimum spend not met for this coupon.'
            ], 422);
        }


        $discount = 0.0;
        if ($coupon->discount_type === 'percentage') {
            $discount = ($subtotal * ((float)$coupon->discount_value / 100.0));
            $discount = (float)$coupon->discount_value;
        }

        if ($coupon->max_discount_amount > 0) {
            $discount = min($discount, (float)$coupon->max_discount_amount);
        }

        $discount = min($discount, $subtotal);

        $total = max(0, $subtotal - $discount);


        return response()->json([
            'success'      => true,
            'coupon_id'    => $coupon->id,
            'code'         => $coupon->code,
            'subtotal_raw' => $subtotal,
            'discount_raw' => $discount,
            'total_raw'    => max(0, $subtotal - $discount),

            'subtotal'     => productAmount($subtotal),
            'discount'     => '-' . productAmount($discount),
            'total'        => productAmount(max(0, $subtotal - $discount)),
        ]);
    }
    public function checkout(Request $request)
    {

        $user = auth('web')->user();
        $userId   = $user?->id;
        $deviceId = $request->cookie('device_id');

        // Load cart for user OR device
        $cartItems = Cart::with([
            'product.images',
            'variant.attributes.attribute',
            'variant.attributes.attributeValue',
        ])
            ->where('status', 'active')
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when(!$userId && $deviceId, fn($q) => $q->where('device_id', $deviceId))
            ->get();

        // Subtotal & total weight (assume product->weight in KG; fallback 1kg per qty)
        $subtotal = 0;
        $totalWeight = 0;
        foreach ($cartItems as $item) {
            $subtotal += (float)$item->price * (int)$item->qty;
            $itemWeight = $item->product->weight ?? 1;
            $totalWeight += $itemWeight * (int)$item->qty;
        }

        // Countries for dropdown
        $countries = Country::orderBy('name')->get(['id', 'name']);

        // Prefill from default address if available
        $defaultAddress = $user?->addresses()->orderByDesc('is_default')->orderBy('id')->first();

        $prefillCountryId = $defaultAddress?->country_id;
        $prefillStateId   = $defaultAddress?->state_id;
        $prefillCityId    = $defaultAddress?->city_id;

        // Preload states/cities if we have prefill IDs (so the select shows current values)
        $states = $prefillCountryId ? State::where('country_id', $prefillCountryId)->orderBy('name')->get(['id', 'name']) : collect();
        $cities = $prefillStateId   ? City::where('state_id', $prefillStateId)->orderBy('name')->get(['id', 'name']) : collect();

        return view('user.cart.checkout', [
            'cartItems'       => $cartItems,
            'subtotal'        => $subtotal,
            'totalWeight'     => $totalWeight,
            'countries'       => $countries,
            'states'          => $states,
            'cities'          => $cities,
            'prefillCountryId' => $prefillCountryId,
            'prefillStateId'  => $prefillStateId,
            'prefillCityId'   => $prefillCityId,
            'defaultAddress'  => $defaultAddress,
        ]);
    }

    public function process_checkout(Request $request)
    {

        $request->validate([
            'first_name'     => ['required', 'string', 'max:100'],
            'last_name'      => ['required', 'string', 'max:100'],
            'email'          => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::id())],
            'phone'          => ['required', 'string', 'max:50'],
            'address'        => ['required', 'string', 'max:255'],
            'address_2'      => ['nullable', 'string', 'max:255'],
            'country_id'     => ['required', 'exists:countries,id'],
            'state_id'       => ['required', 'exists:states,id'],
            'city_id'        => ['required', 'exists:cities,id'],
            'postal_code'    => ['required', 'string', 'max:50'],
            'order_notes'    => ['nullable', 'string', 'max:500'],
            'payment_method' => ['required', Rule::in(['cod', 'bank_transfer', 'credit_card', 'paypal', 'stripe', 'other'])],

            'create_account'        => ['nullable'],
            'password'              => ['nullable', 'min:6', 'confirmed'],
        ]);

        $settings = (object) Setting::pluck('value', 'key')->toArray();
        $currency = $settings->currency ?? 'PKR';

        $user = Auth::guard('web')->user();
        $deviceId = $request->cookie('device_id');

        $cartsQuery = Cart::with([
            'product',
            'variant.attributes.attribute',
            'variant.attributes.attributeValue',
        ])->where('status', 'active');

        if ($user) {
            $cartsQuery->where('user_id', $user->id);
        } else {
            if (!$deviceId) {
                return back()->withErrors(['cart' => 'Your cart is empty.'])->withInput();
            }
            $cartsQuery->where('device_id', $deviceId);
        }

        $cartItems = $cartsQuery->get();
        if ($cartItems->isEmpty()) {
            return back()->withErrors(['cart' => 'Your cart is empty.'])->withInput();
        }

        $subtotal = 0.0;
        $totalWeight = 0.0;
        foreach ($cartItems as $item) {
            $line = (float)$item->price * (int)$item->qty;
            $subtotal += $line;
            $w = (float)($item->product->weight ?? 0);
            $totalWeight += $w * (int)$item->qty;
        }

        $couponCode = trim((string)$request->input('applied_coupon_code', ''));
        $discountAmount = 0.0;
        $couponId = null;

        if ($couponCode !== '') {
            $coupon = Coupon::where('code', $couponCode)
                ->where('status', 'active')
                ->first();

            if ($coupon) {
                $now = Carbon::now()->startOfDay();
                if (($coupon->start_date && $now->lt(Carbon::parse($coupon->start_date))) ||
                    ($coupon->end_date && $now->gt(Carbon::parse($coupon->end_date)))
                ) {
                } else {
                    if ($coupon->total_usage_limit > 0 && $coupon->total_usage_count >= $coupon->total_usage_limit) {
                    } else {
                        if (!$user && !$coupon->is_for_guest) {
                        } else {
                            if ($subtotal >= (float)$coupon->min_spend) {
                                if ($coupon->discount_type === 'percentage') {
                                    $discountAmount = round(($subtotal * (float)$coupon->discount_value) / 100, 2);
                                } else {
                                    $discountAmount = round((float)$coupon->discount_value, 2);
                                }
                                if ($coupon->max_discount_amount > 0 && $discountAmount > $coupon->max_discount_amount) {
                                    $discountAmount = (float)$coupon->max_discount_amount;
                                }
                                $couponId = $coupon->id;
                            }
                        }
                    }
                }
            }
        }

        $shippingRules = is_string($settings->shipping ?? null)
            ? (json_decode($settings->shipping, true) ?: [])
            : ($settings->shipping ?? []);

        $country = Country::find($request->country_id);
        $city    = City::find($request->city_id);

        $shippingCost = 0.0;
        $shippingLabel = '';
        $countryName = $country?->name ?? '';
        $cityName    = $city?->name ?? '';

        $match = null;
        foreach ((array)$shippingRules as $r) {
            $loc = $r['location'] ?? null;
            if (is_array($loc)) {
                $cities = array_map(fn($x) => mb_strtolower((string)$x), $loc);
                if (in_array(mb_strtolower($cityName), $cities, true)) {
                    $match = $r;
                    break;
                }
            } else {
                $locStr = mb_strtolower((string)$loc);
                if ($locStr === 'pakistan' && mb_strtolower($countryName) === 'pakistan') {
                    $match = $r;
                    break;
                }
                if ($locStr === 'other country' && $countryName && mb_strtolower($countryName) !== 'pakistan') {
                    $match = $r;
                    break;
                }
                if ($locStr === mb_strtolower($countryName)) {
                    $match = $r;
                    break;
                }
            }
        }
        if ($match) {
            $base  = (float)($match['base_rate'] ?? 0);
            $perKg = (float)($match['per_kg_rate'] ?? 0);
            $shippingCost = round($base + $perKg * (float)$totalWeight, 2);
            $shippingLabel = is_array($match['location']) ? implode(', ', $match['location']) : (string)$match['location'];
        }

        $total = max(0, ($subtotal - $discountAmount) + $shippingCost);

        DB::beginTransaction();

        try {
            if (!$user && $request->boolean('create_account')) {

                $user = User::create([
                    'name'              => trim($request->first_name . ' ' . $request->last_name),
                    'email'             => $request->email,
                    'password'          => Hash::make($request->password),
                    'status'            => 'active',
                    'email_verified_at' => null,
                ]);
                Auth::login($user);
            }

            $billing = Address::create([
                'type'          => 'billing',
                'full_name'     => trim($request->first_name . ' ' . $request->last_name),
                'company'       => null,
                'address_line_1' => $request->address,
                'address_line_2' => $request->address_2,
                'country_id'    => $request->country_id,
                'state_id'      => $request->state_id,
                'city_id'       => $request->city_id,
                'postcode'      => $request->postal_code,
                'phone'         => $request->phone,
                'is_default'    => $user ? true : false,
            ]);

            $shipping = Address::create([
                'user_id'       => $user?->id,
                'type'          => 'shipping',
                'full_name'     => $billing->full_name,
                'company'       => null,
                'address_line_1' => $billing->address_line_1,
                'address_line_2' => $billing->address_line_2,
                'country_id'    => $billing->country_id,
                'state_id'      => $billing->state_id,
                'city_id'       => $billing->city_id,
                'postcode'      => $billing->postcode,
                'phone'         => $billing->phone,
                'is_default'    => $user ? true : false,
            ]);

            $order = Order::create([
                'invoice_number'     => null,

                'currency'           => $currency,
                'subtotal'           => $subtotal,
                'discount_amount'    => $discountAmount,
                'tax_amount'         => 0.00,
                'tax_type'           => null,
                'shipping_amount'    => $shippingCost,
                'fees_amount'        => 0.00,
                'total_amount'       => $total,

                'payment_method'     => $request->payment_method,
                'payment_status'     => 'pending',
                'transaction_id'     => null,

                'customer_note'      => $request->order_notes,

                'shipping_address_id' => $shipping->id,
                'billing_address_id' => $billing->id,


                'user_id'            => $user?->id,
                'updated_by'         => null,
            ]);

            foreach ($cartItems as $item) {
                $attrs = [];
                if ($item->variant && $item->variant->relationLoaded('attributes')) {
                    foreach ($item->variant->attributes as $va) {
                        $attrs[$va->attribute?->name ?? ''] = $va->attributeValue?->value ?? '';
                    }
                }

                OrderDetail::create([
                    'order_id'          => $order->id,
                    'cart_id'           => $item->id,
                    'product_id'        => $item->product_id,
                    'qty'               => (int)$item->qty,
                    'variant_id'        => $item->variant_id,
                    'product_name'      => $item->product?->name,
                    'price'      => $item->product?->sale_price ?? $item->product?->price,
                    'sku'               => $item->product?->sku ?? null,
                    'variant_attributes' => !empty($attrs) ? json_encode($attrs) : null,
                ]);
            }

            if ($couponId) {
                Coupon::where('id', $couponId)->increment('total_usage_count');
            }

            if ($user) {
                Cart::where('user_id', $user->id)->where('status', 'active')->delete();
            } else {
                Cart::where('device_id', $deviceId)->where('status', 'active')->delete();
            }

            DB::commit();

            return redirect()->route('user.orders.show', encrypt($order->id))->with('success', 'Order placed successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            report($e);
            dd($e, $request->all());
            return back()->withErrors(['order' => $e])->withInput();
        }
    }
    protected function generateOrderNumber(): string
    {
        return 'ORD-' . now()->format('Ym') . '-' . Str::upper(Str::random(5));
    }
}

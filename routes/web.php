<?php

use App\Http\Controllers\ShopifyImportController;
use App\Http\Controllers\User\AddressController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\VendorController;
use App\Models\Order;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::get('/import-shopify', [ShopifyImportController::class, 'import'])->name('shopify.import');
require __DIR__ . '/auth.php';


// Public routes (no authentication needed)LoginRequest
Route::name('user.')->group(function () {

    // AJAX routes
    Route::post('/ajax/login', [HomeController::class, 'login'])->name('login.ajax');
    Route::post('/ajax/register', [HomeController::class, 'register'])->name('register.ajax');

    // Home and static pages
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [HomeController::class, 'index'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/contact/submit', [HomeController::class, 'contact'])->name('contact.submit');
    Route::get('/privacy', [HomeController::class, 'index'])->name('privacy');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');

    // Product routes
    Route::get('/shop', [ProductController::class, 'index'])->name('shop');
    Route::get('/product/{slug}', [ProductController::class, 'detail'])->name('product.detail');
    Route::post('/product/variant-details', [ProductController::class, 'getVariantDetails'])
        ->name('product.getVariantDetails');
    // Vendor routes
    Route::get('/vendor/{slug}', [VendorController::class, 'detail'])->name('vendor.detail');
    Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
    Route::get('/vendor/contact', [VendorController::class, 'index'])->name('vendor.contact');

    // Cart routes (some may need auth later)
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/cart/mini', [CartController::class, 'fetchMiniCart'])->name('cart.mini');
    Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/update', [CartController::class, 'updateCart'])->name('cart.updateQty');
    Route::delete('/remove-cart/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::delete('/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear');
    Route::post('/check/coupon', [CartController::class, 'removeCart'])->name('cart.coupon');
    // Cart management
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/process', [CartController::class, 'checkout'])->name('checkout.process');


    // Search and deals
    Route::get('/search', [HomeController::class, 'index'])->name('search');
    Route::get('/daily/deal', [productController::class, 'deals'])->name('daily.deals');
    Route::get('/compare', [HomeController::class, 'index'])->name('compare');


    Route::post('/order/track/check', [OrderController::class, 'orderTrackCheck'])->name('order.track.check');
    // web.php
    Route::get('/order/track', [OrderController::class, 'orderTrack'])->name('order.track');
    Route::post('/order/track', [OrderController::class, 'orderTrackCheck'])->name('track.order');

    // Authenticated user routes
    Route::middleware(['auth'])->group(function () {
        // Dashboard
        Route::get('/reviews/store', [HomeController::class, 'index'])->name('reviews.store');
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

        // Profile routes
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('/account', [ProfileController::class, 'dashboard'])->name('account');
        Route::put('/account/update', [ProfileController::class, 'updateDetails'])->name('account.update');

        // Order routes
        Route::get('/order', [HomeController::class, 'index'])->name('order');
        Route::get('/order/{id}', [HomeController::class, 'index'])->name('order.show');

        // Wishlist
        Route::get('/wishlist', [ProductController::class, 'wishlist'])->name('wishlist');
        Route::post('/wishlist/toggle', [ProductController::class, 'toggle'])->name('wishlist.toggle');

        // Orders
        Route::get('/account/orders', [ProfileController::class, 'index'])->name('orders.index');
        Route::get('/account/orders/{order}', [ProfileController::class, 'show'])->name('orders.show');


        // Address management
        Route::prefix('addresses')->group(function () {
            Route::get('/', [AddressController::class, 'index'])->name('addresses.index');
            Route::get('/create', [AddressController::class, 'create'])->name('addresses.create');
            Route::post('/', [AddressController::class, 'store'])->name('addresses.store');
            Route::get('/{address}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
            Route::put('/{address}', [AddressController::class, 'update'])->name('addresses.update');
            Route::delete('/{address}', [AddressController::class, 'destroy'])->name('addresses.destroy');
            Route::post('/{address}/set-default', [AddressController::class, 'setDefault'])->name('addresses.set-default');
        });
    });
    Route::get('/{slug}', [HomeController::class, 'page'])->name('page');
});

// System routes (not user-facing)
Route::get('/run-migrations', function (Request $request) {
    if ($request->query('key') !== env('MIGRATION_SECRET')) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    Artisan::call('migrate --seed');
    return response()->json(['message' => 'Migration and seeding completed successfully.']);
});

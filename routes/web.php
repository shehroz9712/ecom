<?php

use App\Http\Controllers\ShopifyImportController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\VendorController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/import-shopify', [ShopifyImportController::class, 'import'])->name('shopify.import');




Route::name('user.')->group(function () {
    require __DIR__ . '/auth.php';

    Route::post('/ajax/login', [HomeController::class, 'login'])->name('login.ajax');
    Route::post('/ajax/register', [HomeController::class, 'register'])->name('register.ajax');

    route::get('/', [HomeController::class, 'index'])->name('home');
    route::get('/blog', [HomeController::class, 'index'])->name('blog');
    route::get('/shop', [HomeController::class, 'index'])->name('shop');
    route::get('/about', [HomeController::class, 'index'])->name('about');
    route::get('/review/store', [HomeController::class, 'index'])->name('reviews.store');


    route::get('/shop', [ProductController::class, 'index'])->name('shop');
    route::get('/product/{slug}', [ProductController::class, 'detail'])->name('product.detail');

    route::get('/vendor/{slug}', [VendorController::class, 'detail'])->name('vendor.detail');
    route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');


    route::Post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
    route::delete('/remove-cart/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
    route::get('/cart', [CartController::class, 'index'])->name('cart');
    route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('/cart/mini', [CartController::class, 'fetchMiniCart'])->name('cart.mini');


    route::get('/daily/deal', [HomeController::class, 'index'])->name('daily.deals');
    route::get('/order/track', [HomeController::class, 'index'])->name('order.track');
    route::post('/order/track/check', [HomeController::class, 'index'])->name('order.track.check');

    route::get('/search', [HomeController::class, 'index'])->name('search');
    route::get('/order', [HomeController::class, 'index'])->name('order');
    route::get('/order/{id}', [HomeController::class, 'index'])->name('order.show');
    route::get('/order/track', [HomeController::class, 'index'])->name('order.track');
    route::get('/blog', [HomeController::class, 'index'])->name('blog');

    route::get('/compare', [HomeController::class, 'index'])->name('compare');
    route::get('/vendor', [HomeController::class, 'index'])->name('vendor');


    route::get('/wishlist', [HomeController::class, 'index'])->name('wishlist');

    route::get('/profile', [HomeController::class, 'index'])->name('profile');

    route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    route::get('/privacy', [HomeController::class, 'index'])->name('privacy');

    Route::get('/account', [ProfileController::class, 'dashboard'])->name('user.account');

    // Update Account Details
    Route::put('/account/update', [ProfileController::class, 'updateDetails'])->name('user.account.update');

    // Orders
    Route::get('/account/orders', [OrderController::class, 'index'])->name('user.orders.index');
    Route::get('/account/orders/{order}', [OrderController::class, 'show'])->name('user.orders.show');

    // Addresses
    Route::resource('/account/addresses', AddressController::class)->names([
        'index' => 'user.addresses.index',
        'create' => 'user.addresses.create',
        'store' => 'user.addresses.store',
        'edit' => 'user.addresses.edit',
        'update' => 'user.addresses.update',
        'destroy' => 'user.addresses.destroy'
    ]);
});





Route::get('/run-migrations', function (Request $request) {
    if ($request->query('key') !== env('MIGRATION_SECRET')) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    Artisan::call('migrate --seed');
    return response()->json(['message' => 'Migration and seeding completed successfully.']);
});

<?php

use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


require __DIR__ . '/auth.php';

route::get('/', [HomeController::class, 'index'])->name('home');
route::get('/blog', [HomeController::class, 'index'])->name('blog');
route::get('/shop', [HomeController::class, 'index'])->name('shop');
route::get('/about', [HomeController::class, 'index'])->name('about');




route::get('/cart', [HomeController::class, 'index'])->name('cart');
route::get('/checkout', [HomeController::class, 'index'])->name('checkout');
route::get('/product/{slug}', [HomeController::class, 'index'])->name('product.detail');
route::get('/search', [HomeController::class, 'index'])->name('search');
route::get('/order', [HomeController::class, 'index'])->name('order');
route::get('/order/{id}', [HomeController::class, 'index'])->name('order.show');
route::get('/order/track', [HomeController::class, 'index'])->name('order.track');
route::get('/blog', [HomeController::class, 'index'])->name('blog');

route::get('/compare', [HomeController::class, 'index'])->name('compare');
route::get('/vendor', [HomeController::class, 'index'])->name('vendor');


route::get('/wishlist', [HomeController::class, 'index'])->name('wishlist');

route::get('/profile', [HomeController::class, 'index'])->name('profile');

route::get('/contact', [HomeController::class, 'index'])->name('contact');











Route::get('/run-migrations', function (Request $request) {
    if ($request->query('key') !== env('MIGRATION_SECRET')) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    Artisan::call('migrate --seed');
    return response()->json(['message' => 'Migration and seeding completed successfully.']);
});

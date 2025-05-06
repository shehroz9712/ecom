<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $userId = auth()->id();
            $deviceId = request()->cookie('device_id');

            $carts = Cart::with('product.images') // eager load product & images
                ->when($userId, fn($q) => $q->where('user_id', $userId))
                ->when(!$userId, fn($q) => $q->where('device_id', $deviceId))
                ->where('status', 'active')
                ->get();

            $cartCount = $carts->sum('qty');
            $cartSubtotal = $carts->sum(fn($item) => $item->price * $item->qty);

            $view->with([
                'headerCarts' => $carts,
                'headerCartCount' => $cartCount,
                'headerCartSubtotal' => $cartSubtotal,
            ]);
        });

        $settings = (object)[];
        $categories = collect();
        $brands = collect();

        if (Schema::hasTable('settings')) {
            $settings = (object) Setting::where('status', 'active')
                ->pluck('value', 'key')
                ->toArray();
        }

        if (Schema::hasTable('categories')) {
            $categories = Category::with('activeSubCategories.activeItems')->get();
        }

        if (Schema::hasTable('brands')) {
            $brands = Brand::get(); // Customize with relations if needed
        }

        View::share(compact('settings', 'categories', 'brands'));

        $this->composeAdminPages();
    }


    private function composeAdminPages() {}
}

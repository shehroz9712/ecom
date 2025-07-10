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
            $productId = auth()->id();
            $deviceId = request()->cookie('device_id');

            $carts = Cart::with('product.images') // eager load product & images
                ->when($productId, fn($q) => $q->where('product_id', $productId))
                ->when(!$productId, fn($q) => $q->where('device_id', $deviceId))
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


    private function composeAdminPages()
    {



        /*
         * variant
         */
        view()->composer('admin.variants.index', function ($view) {
            $view->with(['pageTitle' => ' Variants List']);
        });
        view()->composer('admin.variants.create', function ($view) {
            $view->with(['pageTitle' => 'Add  Variant']);
        });
        view()->composer('admin.variants.show', function ($view) {
            $view->with(['pageTitle' => 'Show  Variant']);
        });
        view()->composer('admin.variants.edit', function ($view) {
            $view->with(['pageTitle' => 'Edit  Variant']);
        });
        /*
         * user
         */
        view()->composer('admin.users.index', function ($view) {
            $view->with(['pageTitle' => ' Users List']);
        });
        view()->composer('admin.users.create', function ($view) {
            $view->with(['pageTitle' => 'Add  User']);
        });
        view()->composer('admin.users.show', function ($view) {
            $view->with(['pageTitle' => 'Show  User']);
        });
        view()->composer('admin.users.edit', function ($view) {
            $view->with(['pageTitle' => 'Edit  User']);
        }); /*
         * order
         */
        view()->composer('admin.orders.index', function ($view) {
            $view->with(['pageTitle' => ' Orders List']);
        });
        view()->composer('admin.orders.create', function ($view) {
            $view->with(['pageTitle' => 'Add  Order']);
        });
        view()->composer('admin.orders.show', function ($view) {
            $view->with(['pageTitle' => 'Show  Order']);
        });
        view()->composer('admin.orders.edit', function ($view) {
            $view->with(['pageTitle' => 'Edit  Order']);
        });
        /*
         * order
         */
        view()->composer('admin.setting.index', function ($view) {
            $view->with(['pageTitle' => ' Setting List']);
        });
        view()->composer('admin.setting.create', function ($view) {
            $view->with(['pageTitle' => 'Add  Setting']);
        });
        view()->composer('admin.setting.show', function ($view) {
            $view->with(['pageTitle' => 'Show  Setting']);
        });
        view()->composer('admin.setting.edit', function ($view) {
            $view->with(['pageTitle' => 'Edit  Setting']);
        });
        /*
         * product
         */
        view()->composer('admin.products.index', function ($view) {
            $view->with(['pageTitle' => ' Products List']);
        });
        view()->composer('admin.products.create', function ($view) {
            $view->with(['pageTitle' => 'Add  Product']);
        });
        view()->composer('admin.products.show', function ($view) {
            $view->with(['pageTitle' => 'Show  Product']);
        });
        view()->composer('admin.products.edit', function ($view) {
            $view->with(['pageTitle' => 'Edit  Product']);
        });
          /*
         * admin
         */
        view()->composer('admin.admins.index', function ($view) {
            $view->with(['pageTitle' => ' Admins List']);
        });
        view()->composer('admin.admins.create', function ($view) {
            $view->with(['pageTitle' => 'Add  Admin']);
        });
        view()->composer('admin.admins.show', function ($view) {
            $view->with(['pageTitle' => 'Show  Admin']);
        });
        view()->composer('admin.admins.edit', function ($view) {
            $view->with(['pageTitle' => 'Edit  Admin']);
        });
    }
}

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
        $entities = [
            'admins'            => 'Admin',
            'users'             => 'User',
            'products'          => 'Product',
            'product_images'    => 'Product Image',
            'product_variants'  => 'Variant',
            'product_variant_attributes' => 'Variant Attribute',
            'categories'        => 'Category',
            'sub_categories'    => 'Sub Category',
            'sub_category_items' => 'Sub Category Item',
            'orders'            => 'Order',
            'reviews'           => 'Review',
            'review_images'     => 'Review Image',
            'testimonials'      => 'Testimonial',
            'vendors'           => 'Vendor',
            'wishlists'         => 'Wishlist',
            'blogs'             => 'Blog',
            'pages'             => 'Page',
            'sliders'           => 'Slider',
            'payment_methods'   => 'Payment Method',
            'countries'         => 'Country',
            'states'            => 'State',
            'cities'            => 'City',
            'addresses'         => 'Address',
            'settings'          => 'Setting',
        ];

        foreach ($entities as $folder => $title) {
            view()->composer("admin.{$folder}.index", function ($view) use ($title) {
                $view->with(['pageTitle' => "{$title}s List"]);
            });
            view()->composer("admin.{$folder}.create", function ($view) use ($title) {
                $view->with(['pageTitle' => "Add {$title}"]);
            });
            view()->composer("admin.{$folder}.show", function ($view) use ($title) {
                $view->with(['pageTitle' => "Show {$title}"]);
            });
            view()->composer("admin.{$folder}.edit", function ($view) use ($title) {
                $view->with(['pageTitle' => "Edit {$title}"]);
            });
        }
    }
}

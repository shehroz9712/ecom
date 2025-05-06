<?php

namespace App\Providers;

use App\Models\Brand;
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
        $settings = (object)[];
        $categories = collect();
        $brands = collect();

        // if (Schema::hasTable('settings')) {
        //     $settings = (object) Setting::where('status', 'active')
        //         ->pluck('value', 'key')
        //         ->toArray();
        // }

        // if (Schema::hasTable('categories')) {
        //     $categories = Category::with('activeSubCategories.activeItems')->get();
        // }

        // if (Schema::hasTable('brands')) {
        //     $brands = Brand::get(); // Customize with relations if needed
        // }



        // View::share(compact('settings', 'categories', 'brands'));

        $this->composeAdminPages();
    }


    private function composeAdminPages() {}
}

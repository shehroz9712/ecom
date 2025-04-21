<?php

namespace App\Providers;

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
        try {
            if (Schema::hasTable('settings')) {
                $settingsArray = Setting::where('status', 'active')
                    ->pluck('value', 'key')
                    ->toArray();

                // Convert array to object
                $settings = json_decode(json_encode($settingsArray));
            } else {
                $settings = (object)[];
            }
        } catch (\Exception $e) {
            // Log::error('Settings load failed: ' . $e->getMessage());
            $settings = (object)[];
        }
        
        View::share('settings', json_decode(json_encode($settings)));
        $this->composeAdminPages();
    }

    private function composeAdminPages() {}
}

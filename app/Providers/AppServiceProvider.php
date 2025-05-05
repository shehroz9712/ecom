<?php

namespace App\Providers;


use App\Repositories\Interfaces\SliderRepositoryInterface;
use App\Repositories\Interfaces\VendorRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Exceptions\Handler;
use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\StateRepositoryInterface;
use App\Repositories\SliderRepository;
use App\Repositories\StateRepository;
use App\Repositories\VendorRepository;
use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandlerContract;
use Illuminate\Support\Facades\Route;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ExceptionHandlerContract::class, Handler::class);
        $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);
        $this->app->bind(VendorRepositoryInterface::class, VendorRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(StateRepositoryInterface::class, StateRepository::class);
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }
}

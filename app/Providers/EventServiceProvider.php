<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\MergeGuestCart::class,
        ],
    ];
}

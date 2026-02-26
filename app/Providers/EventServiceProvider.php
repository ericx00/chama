<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // 'App\Events\OrderShipped' => [
        //     'App\Listeners\SendShipmentNotification',
        // ],
    ];

    protected $subscribe = [
        // App\Listeners\UserEventSubscriber::class,
    ];

    public function boot()
    {
        //
    }

    public function register()
    {
        //
    }
}

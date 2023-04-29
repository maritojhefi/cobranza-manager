<?php

namespace App\Providers;

use App\Models\Abono;
use App\Models\Gasto;
use App\Models\Prestamo;
use App\Observers\AbonoObserver;
use App\Observers\GastoObserver;
use App\Observers\PrestamoObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Gasto::observe(GastoObserver::class);
        Prestamo::observe(PrestamoObserver::class);
        Abono::observe(AbonoObserver::class);
    }
}

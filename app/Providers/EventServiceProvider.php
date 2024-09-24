<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\CreatingModel;
use App\Listeners\IncrementIdListener;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        CreatingModel::class => [
            IncrementIdListener::class,
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}

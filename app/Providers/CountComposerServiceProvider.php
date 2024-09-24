<?php

namespace App\Providers;

use App\Models\Materialrequest;
use App\Models\Prodev;
use App\Models\Purchasing;
use App\Models\Sales;
use Illuminate\Support\ServiceProvider;

class CountComposerServiceProvider extends ServiceProvider
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
        view()->composer('*', function ($view) {
        // Hitung jumlah 'Waiting List'
        $waitingListMR = Materialrequest ::where('status', 'Waiting List')->count();
        $waitingPO = Purchasing ::where('status', 'Waiting')->count();
        $waitingSales = Sales ::where('statussc', 'Waiting')->count();
        $waitingJOB = Prodev ::where('statusjob', 'Waiting')->count();

        // Melewatkan data ke view
        $view->with([
            'waitingPO' => $waitingPO,
            'waitingListMR' => $waitingListMR,
            'waitingJOB' => $waitingJOB,
            'waitingSales' => $waitingSales,
        ]);
    });
    }
}

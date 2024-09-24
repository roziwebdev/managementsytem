<?php

namespace App\Providers;

use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
     public function boot()
    {
        // Bagikan hasil perhitungan ke semua view
        View::composer('*', function ($view) {
            $dataprice = $this->calculatePercentageChangePrice();
            $data = $this->calculatePercentageChange();
            $view->with(compact('dataprice', 'data'));
        });
    }

    public function calculatePercentageChange()
    {
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        $dataThisWeek = Sales::whereBetween('created_at', [$startDate, $endDate])->count();

        $previousStartDate = $startDate->copy()->subWeek();
        $previousEndDate = $endDate->copy()->subWeek();
        $dataLastWeek = Sales::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();

        if ($dataLastWeek != 0) {
            $percentageChange = (($dataThisWeek - $dataLastWeek) / $dataLastWeek) * 100;
        } else {
            $percentageChange = 0;
        }

        return [
            'dataThisWeek' => $dataThisWeek,
            'dataLastWeek' => $dataLastWeek,
            'percentageChange' => number_format($percentageChange, 2)
        ];
    }

    /**
     * Function yang menghitung persentase perubahan harga
     */
    public function calculatePercentageChangePrice()
    {
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        $dataThisWeek = Sales::whereBetween('created_at', [$startDate, $endDate])->get();
        $previousStartDate = $startDate->copy()->subWeek();
        $previousEndDate = $endDate->copy()->subWeek();
        $dataLastWeek = Sales::whereBetween('created_at', [$previousStartDate, $previousEndDate])->get();

        $totalPriceThisWeek = 0;
        foreach ($dataThisWeek as $item) {
            $prices = json_decode($item->total, true);
            $totalPriceThisWeek += array_sum($prices);
        }

        $totalPriceLastWeek = 0;
        foreach ($dataLastWeek as $item) {
            $prices = json_decode($item->total, true);
            $totalPriceLastWeek += array_sum($prices);
        }

        if ($totalPriceLastWeek != 0) {
            $percentageChange = (($totalPriceThisWeek - $totalPriceLastWeek) / $totalPriceLastWeek) * 100;
        } else {
            $percentageChange = 0;
        }

        return [
            'totalPriceThisWeek' => $totalPriceThisWeek,
            'totalPriceLastWeek' => $totalPriceLastWeek,
            'percentageChange' => number_format($percentageChange, 2)
        ];
    }
}

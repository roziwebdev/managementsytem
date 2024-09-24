<?php

namespace App\Http\Controllers\Sales\Manager;

use App\Http\Controllers\Controller;
use App\Models\Sales;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SalesmgrController extends Controller
{
    public function index(Request $request) 
    {
        $query = Sales::query();
        // Pencarian berdasarkan ID atau produk
        if ($request->has('search')) {
            $searchValue = $request->input('search');
    
            $query->where(function($q) use ($searchValue) {
                $q->where('id', $searchValue)
                  ->orWhere('product', 'like', '%' . $searchValue . '%')
                  ->orWhere('customer', 'like', '%' . $searchValue . '%')
                  ->orWhere('tender', 'like', '%' . $searchValue . '%');
            });
        }
    
        if ($request->has('statussc')) {
            $statusFilter = $request->input('statussc');
            $query->where('statussc', $statusFilter);
        }
    
        // Filter produk berdasarkan ascending (asc) atau descending (desc)
        $sortBy = $request->input('sort_by', null);
    
        if (!$sortBy) {
            // Jika tidak ada query pencarian, urutkan berdasarkan updated_at terbaru
            $query->orderByDesc('id');
        } elseif ($sortBy == 'asc') {
            // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
            $query->orderBy('id');
        } elseif ($sortBy == 'desc') {
            // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
            $query->orderByDesc('id');
        } elseif ($sortBy == 'ascproduct') {
            // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan product secara ascending
            $query->orderBy('product');
        } elseif ($sortBy == 'descproduct') {
            // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan product secara descending
            $query->orderByDesc('product');
        }
        // Ambil data berdasarkan query yang telah dibuat
        $salescontract = $query->paginate(20);
        return view('role.sales.salesmanager.listsc', compact('salescontract'));
    }   
    
    public function show ($id){
        $data = Sales::find($id);
        return view ('role.sales.salesmanager.show',compact('data'));
    }


   

    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $salescontract = Sales::find($id);
        $salescontract->statussc = $newStatus;
        $salescontract->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
    
     public function print($id){
            $sc = Sales::find($id);
            return view('role.sales.salesmanager.print', compact('sc'));
    }
    
    public function printpo($po){
            $sc = Sales::where('po', $po)->first();
            return view('role.sales.salesmanager.printpo', compact('sc'));
    }
    
     public function calculatePercentageChange()
    {
        // Ambil tanggal hari ini dan tanggal seminggu yang lalu
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        // Ambil jumlah data dari satu minggu terakhir
        $dataThisWeek = Sales::whereBetween('created_at', [$startDate, $endDate])->count();

        // Ambil jumlah data dari minggu sebelumnya
        $previousStartDate = $startDate->copy()->subWeek();
        $previousEndDate = $endDate->copy()->subWeek();
        $dataLastWeek = Sales::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();

        // Hitung persentase kenaikan atau penurunan data
        if ($dataLastWeek != 0) {
            $percentageChange = (($dataThisWeek - $dataLastWeek) / $dataLastWeek) * 100;
        } else {
            $percentageChange = 0; // Jika data minggu sebelumnya kosong, maka persentase kenaikan dianggap 0
        }

        // Mengembalikan hasil perhitungan
        return [
            'dataThisWeek' => $dataThisWeek,
            'dataLastWeek' => $dataLastWeek,
            'percentageChange' => number_format($percentageChange, 2)
        ];
    }

    public function calculatePercentageChangePrice()
    {
        // Ambil tanggal hari ini dan tanggal seminggu yang lalu
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        // Ambil data dari satu minggu terakhir
        $dataThisWeek = Sales::whereBetween('created_at', [$startDate, $endDate])->get();

        // Ambil data dari minggu sebelumnya
        $previousStartDate = $startDate->copy()->subWeek();
        $previousEndDate = $endDate->copy()->subWeek();
        $dataLastWeek = Sales::whereBetween('created_at', [$previousStartDate, $previousEndDate])->get();

        // Menghitung jumlah total price untuk satu minggu ini dan minggu sebelumnya
        $totalPriceThisWeek = 0;
        foreach ($dataThisWeek as $item) {
            $prices = json_decode($item->total, true); // Decode string JSON menjadi array PHP
            $totalPriceThisWeek += array_sum($prices); // Menjumlahkan nilai-nilai di dalam array
        }

        $totalPriceLastWeek = 0;
        foreach ($dataLastWeek as $item) {
            $prices = json_decode($item->total, true);
            $totalPriceLastWeek += array_sum($prices);
        }

        // Hitung persentase kenaikan atau penurunan data
        if ($totalPriceLastWeek != 0) {
            $percentageChange = (($totalPriceThisWeek - $totalPriceLastWeek) / $totalPriceLastWeek) * 100;
        } else {
            $percentageChange = 0; // Jika data minggu sebelumnya kosong, maka persentase kenaikan dianggap 0
        }

        // Mengembalikan hasil perhitungan
        return [
            'totalPriceThisWeek' => $totalPriceThisWeek,
            'totalPriceLastWeek' => $totalPriceLastWeek,
            'percentageChange' => number_format($percentageChange, 2)
        ];
    }

    
    
    public function dashboard (){
        $dataprice = $this->calculatePercentageChangePrice();
        $data = $this->calculatePercentageChange();
        return view('role.purchasing.dashboardmanager', compact('data','dataprice'));
    }
    
    
    
}

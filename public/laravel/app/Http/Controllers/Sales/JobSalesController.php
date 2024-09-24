<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Prodev;
use Illuminate\Http\Request;

class JobSalesController extends Controller
{
    public function index(Request $request){
        $query = Prodev::query();
        // Pencarian berdasarkan ID atau produk
        if ($request->has('search')) {
            $searchValue = $request->input('search');
    
            $query->where(function($q) use ($searchValue) {
                $q->where('id', $searchValue)
                  ->orWhere('product', 'like', '%' . $searchValue . '%');
            });
        }
    
        // Filter produk berdasarkan ascending (asc) atau descending (desc)
        $sortBy = $request->input('sort_by', null);
    
        if (!$sortBy) {
            // Jika tidak ada query pencarian, urutkan berdasarkan updated_at terbaru
            $query->orderByDesc('updated_at');
        } elseif ($sortBy == 'asc') {
            // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
            $query->orderBy('id');
        } elseif ($sortBy == 'desc') {
            // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
            $query->orderByDesc('id');
        }
    
        // Ambil data berdasarkan query yang telah dibuat
        $job = $query->paginate(20);
        return view('role.sales.salesdept.job.listjob', compact('job'));
    }
}

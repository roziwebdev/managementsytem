<?php

namespace App\Http\Controllers\Nonppn\sales\manager;

use App\Http\Controllers\Controller;
use App\Models\Salesnonppn;
use Illuminate\Http\Request;

class SalesnonppnManagerController extends Controller
{
     public function index(Request $request) {

    $query = Salesnonppn::query();
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
    return view('role.nonppn.sales.salesmanager.listsc', compact('salescontract'));
}
public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $salescontract = Salesnonppn::find($id);
        $salescontract->statussc = $newStatus;
        $salescontract->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

     public function print($id){
            $sc = Salesnonppn::find($id);
            return view('role.nonppn.sales.salesmanager.print', compact('sc'));
    }

    public function printpo($po){
            $sc = Salesnonppn::where('po', $po)->first();
            return view('role.nonppn.sales.salesmanager.printpo', compact('sc'));
    }
}

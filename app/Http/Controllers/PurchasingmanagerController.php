<?php

namespace App\Http\Controllers;

use App\Models\Purchasing;
use Illuminate\Http\Request;

class PurchasingmanagerController extends Controller
{
   public function index(Request $request)
{
    $sort = $request->input('sort', 'created'); // Default sort by created
    $query = Purchasing::query();
    $status = $request->input('status', null);

    if ($status) {
        $query->where('status', $status);
    }

    // Menambahkan pengurutan berdasarkan kondisi
    $sortBy = $request->input('sort_by', null);
    if (!$sortBy) {
        // Jika tidak ada query pencarian, urutkan berdasarkan updated_at terbaru
        $query->orderBy('id','desc');
    } elseif ($sortBy == 'asc') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
        $query->orderBy('id');
    } elseif ($sortBy == 'desc') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
        $query->orderByDesc('id');
    }

    // Menambahkan pencarian ke dalam query
   if ($request->has('search')) {
    $query->where('id', '=', $request->search)
        ->orWhere('item', 'LIKE', '%' . $request->search . '%')
        ->orWhere('supplier', 'LIKE', '%' . $request->search . '%');
}

    // Menambahkan paginate dan latest
    $perPage = 10;
    $purchasing = $query->latest('created_at')->paginate($perPage);

     return view('role.purchasing.listpomanager', compact('purchasing', 'sort','status'));
}
       
    public function showdetail($id)
    {
        $materialrequest = Purchasing::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.detailpo', ['materialrequest' => $materialrequest]);
    }

    public function show($id)
    {
        $materialrequest = Purchasing::find($id); // Gantilah DataModel dengan model Anda yang sesuai
          $barcode = $materialrequest->barcode;
        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.formpoapprove',compact('materialrequest','barcode'));
    }
    
    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');

        // Validasi data jika diperlukan

        // Temukan Materialrequest berdasarkan ID
        $purchasing = Purchasing::find($id);

        if (!$purchasing) {
            // Tambahkan log atau tindakan lain jika Materialrequest tidak ditemukan
            return redirect()->back()->with('error', 'Materialrequest tidak ditemukan.');
        }

        // Perbarui status
        $purchasing->status = $newStatus;
        $purchasing->save();

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}

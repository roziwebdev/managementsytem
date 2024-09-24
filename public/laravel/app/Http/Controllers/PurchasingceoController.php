<?php

namespace App\Http\Controllers;

use App\Models\Purchasing;
use Illuminate\Http\Request;

class PurchasingceoController extends Controller
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
    if ($sort === 'created_at-asc') {
        $query->orderBy('created_at', 'asc');
    } elseif ($sort === 'created_at-desc') {
        $query->orderBy('created_at', 'desc');
    } elseif ($sort === 'item-asc') {
        $query->orderBy('item', 'asc');
    } elseif ($sort === 'item-desc') {
        $query->orderBy('item', 'desc');
    } elseif ($sort === 'id-asc') {
        $query->orderBy('id', 'asc');
    } elseif ($sort === 'id-desc') {
        $query->orderBy('id', 'desc');
    } else {
        // Menambahkan default pengurutan jika tidak ada yang sesuai
        $query->orderBy('created_at', 'desc');
    }

    // Menambahkan pencarian ke dalam query
    if ($request->has('search')) {
        $query->where('id', 'LIKE', '%' . $request->search . '%')
            ->orWhere('item', 'LIKE', '%' . $request->search . '%');
    }

    // Menambahkan paginate dan latest
    $perPage = 10;
    $purchasing = $query->latest('created_at')->paginate($perPage);

     return view('role.purchasing.listpoceo', compact('purchasing', 'sort','status'));
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
        $details = Purchasing::find($id);
        return view('role.purchasing.poceo.showpo', compact('details'));
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

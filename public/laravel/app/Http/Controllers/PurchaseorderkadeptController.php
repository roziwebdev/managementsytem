<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use App\Models\Purchasing;
use App\Models\Supplier;
use App\Models\Materialrequest;
use Illuminate\Http\Request;
 
class PurchaseorderkadeptController extends Controller
{
    public function index(Request $request)
{
    $sort = $request->input('sort', 'created'); // Default sort by created
    $query = Purchasing::query();
    $status = $request->input('status', null);
    $dept = $request->input('dept', null);

    if ($dept) {
        $query->where('dept', $dept);
    }
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
        $query->where('id', 'LIKE', '%' . $request->search . '%')
            ->orWhere('item', 'LIKE', '%' . $request->search . '%');
    }

    // Menambahkan paginate dan latest
    $perPage = 20;
    $purchasing = $query->latest('created_at')->paginate($perPage);

    return view('role.purchasing.pokadept.listpokadept', compact('purchasing', 'sort', 'status'));
}




    public function show($id)
    {
        $materialrequest = Purchasing::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.pokadept.detailpokadept', ['materialrequest' => $materialrequest]);
    }

    public function showform($id)
    {
        $materialrequest = Purchasing::find($id); // Gantilah DataModel dengan model Anda yang sesuai
          $barcode = $materialrequest->barcode;
        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.formpo',compact('materialrequest','barcode'));
    }


    
}

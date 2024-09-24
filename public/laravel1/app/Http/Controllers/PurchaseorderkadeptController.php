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

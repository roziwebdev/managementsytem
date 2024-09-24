<?php

namespace App\Http\Controllers\Hrd\Manager;

use App\Http\Controllers\Controller;
use App\Models\Karyawanstaff;
use Illuminate\Http\Request;

class KaryawanstaffmanagerController extends Controller
{
    public function index(Request $request){
    $query = Karyawanstaff::query();
    // Pencarian berdasarkan ID atau produk

    if ($request->has('search')) {
        $searchValue = $request->input('search');

        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('departement', 'like', '%' . $searchValue . '%')
              ->orWhere('nama', 'like', '%' . $searchValue . '%');
        });
    }
    
    $status = $request->input('status', null);
    if ($status) {
        $query->where('status', $status);
    }
       $departement = $request->input('departement', null);
    if ($departement) {
        $query->where('departement', $departement);
    }
    
    
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
    } elseif ($sortBy == 'ascname') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
        $query->orderBy('nama');
    } elseif ($sortBy == 'descname') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
        $query->orderByDesc('nama');
    }



    $karyawanstaffs = $query->OrderBy('id', 'desc')->paginate(15);
        return view('role.hrd.karyawanstaff.karyawanstaffmanager.listkaryawan', compact('karyawanstaffs'));
    }
}

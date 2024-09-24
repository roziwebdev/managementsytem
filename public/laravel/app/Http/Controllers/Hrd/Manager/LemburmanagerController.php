<?php

namespace App\Http\Controllers\Hrd\Manager;

use App\Http\Controllers\Controller;
use App\Models\Lembur;
use Illuminate\Http\Request;

class LemburmanagerController extends Controller
{
    
    public function index(Request $request){
    $query = Lembur::query();
    $applyPagination = true; // Variable untuk menentukan apakah paginasi akan diterapkan

    // Filter berdasarkan pencarian ID atau produk
    if ($request->has('search')) {
        $searchValue = $request->input('search');
        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('namakaryawan', 'like', '%' . $searchValue . '%')
              ->orWhere('departement', 'like', '%' . $searchValue . '%');
        });
    }
    $query->where('status', 'Approve');

    // Terapkan pengurutan berdasarkan ID secara descending
    $query->orderByDesc('id');
     if ($request->has('tgl_mulai') && $request->has('tgl_akhir')) {
        $tglMulai = $request->input('tgl_mulai');
        $tglAkhir = $request->input('tgl_akhir');
        $query->where('status', 'Approve')
              ->whereBetween('tgllembur', [$tglMulai, $tglAkhir]);
        // Nonaktifkan paginasi jika ada filter
        $applyPagination = false;
    }

    // Terapkan paginasi jika tidak ada filter
    $lemburs = $applyPagination ? $query->orderByDesc('id')->paginate(10) : $query->get();

    return view('role.hrd.lembur.lemburmanager.listlembur', compact('lemburs', 'applyPagination'));
    }

}
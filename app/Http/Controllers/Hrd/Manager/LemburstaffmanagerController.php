<?php

namespace App\Http\Controllers\Hrd\Manager;

use App\Http\Controllers\Controller;
use App\Models\Lemburstaff;
use Illuminate\Http\Request;

class LemburstaffmanagerController extends Controller
{
    public function index(Request $request){
    $query = Lemburstaff::query();
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
    $lemburstaffs = $applyPagination ? $query->orderByDesc('id')->paginate(10) : $query->get();

    return view('role.hrd.lemburstaff.lemburstaffmanager.listlembur', compact('lemburstaffs', 'applyPagination'));
    }
    
    
    // public function index(Request $request){
    // $query = Lemburstaff::query();
    // $applyPagination = true; // Variable untuk menentukan apakah paginasi akan diterapkan

    // // Filter berdasarkan pencarian ID atau produk
    // if ($request->has('search')) {
    //     $searchValue = $request->input('search');

    //     $query->where(function($q) use ($searchValue) {
    //         $q->where('id', $searchValue)
    //           ->orWhere('namakaryawan', 'like', '%' . $searchValue . '%')
    //           ->orWhere('departement', 'like', '%' . $searchValue . '%');
    //     });
    // }

    // // Filter berdasarkan rentang tanggal jika hanya tanggal yang diisi
    // if ($request->has('status') && $request->has('tgl_mulai') && $request->has('tgl_akhir')) {
    //     $statusFilter = $request->input('status');
    //     $tglMulai = $request->input('tgl_mulai');
    //     $tglAkhir = $request->input('tgl_akhir');
    //     $query->where('status', $statusFilter)
    //           ->whereBetween('tgllembur', [$tglMulai, $tglAkhir]);

    //     // Nonaktifkan paginasi jika ada filter
    //     $applyPagination = false;
    // }

    // // Filter berdasarkan status jika hanya status yang diisi
    // elseif ($request->has('status') && empty($request->input('tgl_mulai')) && empty($request->input('tgl_akhir'))) {
    //     $statusFilter = $request->input('status');
    //     $query->where('status', $statusFilter);

    //     // Nonaktifkan paginasi jika ada filter
    //     $applyPagination = false;
    // }

    // // Filter berdasarkan rentang tanggal jika hanya tanggal yang diisi
    // elseif ($request->has('tgl_mulai') && $request->has('tgl_akhir')) {
    //     $tglMulai = $request->input('tgl_mulai');
    //     $tglAkhir = $request->input('tgl_akhir');
    //     $query->whereBetween('tgllembur', [$tglMulai, $tglAkhir]);
    //     // Nonaktifkan paginasi jika ada filter
    //     $applyPagination = false;
    // }

    // // Terapkan paginasi jika tidak ada filter
    // $lemburstaffs = $applyPagination ? $query->orderByDesc('id')->paginate(10): $query->get();

    //     return view('role.hrd.lemburstaff.lemburstaffmanager.listlembur',compact('lemburstaffs','applyPagination'));
    // }
}

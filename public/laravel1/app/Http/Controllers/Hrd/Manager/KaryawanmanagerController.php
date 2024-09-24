<?php

namespace App\Http\Controllers\Hrd\Manager;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanmanagerController extends Controller
{
    public function index(Request $request){
    $query = Karyawan::query();
    // Pencarian berdasarkan ID atau produk

    if ($request->has('search')) {
        $searchValue = $request->input('search');

        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('departement', 'like', '%' . $searchValue . '%')
              ->orWhere('nama', 'like', '%' . $searchValue . '%');
        });
    }


       $karyawans = $query->OrderBy('id','desc')->paginate(15);
        return view('role.hrd.karyawan.karyawanmanager.listkaryawan', compact('karyawans'));
    }
}

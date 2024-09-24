<?php

namespace App\Http\Controllers\Hrd\Kadept;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawankadeptController extends Controller
{
public function index(Request $request){
    $query = Karyawan::query();
    // Pencarian berdasarkan ID atau produk

    if ($request->has('search')) {
        $searchValue = $request->input('search');

         $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('nama', 'like', '%' . $searchValue . '%')
              ->orWhere('departement', 'like', '%' . $searchValue . '%');
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

    // Filter produk berdasarkan ascending (asc) atau descending (desc)
    $sortBy = $request->input('sort_by', null);
    if (!$sortBy) {
        // Jika tidak ada query pencarian, urutkan berdasarkan updated_at terbaru
        $query->orderBy('id');
    } elseif ($sortBy == 'asc') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
        $query->orderBy('id');
    } elseif ($sortBy == 'desc') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
        $query->orderByDesc('id');
    } elseif ($sortBy == 'ascnama') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
        $query->orderBy('nama');
    } elseif ($sortBy == 'descnama') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
        $query->orderByDesc('nama');
    } 
        
       $karyawans = $query->paginate(15);
        return view('role.hrd.karyawan.karyawankadept.listkaryawan', compact('karyawans'));
    }

    public function store(Request $request){
        $karyawan = new Karyawan;
        $karyawan->nama = $request->nama;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->golonganjabatan = $request->golonganjabatan;
        $karyawan->departement = $request->departement;
        $karyawan->bagian = $request->bagian;
        $karyawan->lokasi = $request->lokasi;
        $karyawan->tglmasuk = $request->tglmasuk;
        $karyawan->status = $request->status;
        $karyawan->save();
        return redirect()->route('karyawannonstaff.index');
    }

    public function edit($id){
        $karyawan = Karyawan::find($id);
        return view('role.hrd.karyawan.karyawankadept.editkaryawan',compact('karyawan'));
    }
    public function update(Request $request, $id){
        $karyawan = Karyawan::find($id);
        $karyawan->nama = $request->nama;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->golonganjabatan = $request->golonganjabatan;
        $karyawan->departement = $request->departement;
        $karyawan->bagian = $request->bagian;
        $karyawan->lokasi = $request->lokasi;
        $karyawan->tglmasuk = $request->tglmasuk;
        $karyawan->status = $request->status;
        $karyawan->save();
        return redirect()->route('karyawannonstaff.index');
    }

}

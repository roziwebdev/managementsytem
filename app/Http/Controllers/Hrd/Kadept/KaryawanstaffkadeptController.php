<?php

namespace App\Http\Controllers\Hrd\Kadept;

use App\Http\Controllers\Controller;
use App\Models\Karyawanstaff;
use Illuminate\Http\Request;

class KaryawanstaffkadeptController extends Controller
{
    public function index(Request $request){
    $query = Karyawanstaff::query();
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
    } elseif ($sortBy == 'ascnama') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan product secara ascending
        $query->orderBy('nama');
    } elseif ($sortBy == 'descnama') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan product secara descending
        $query->orderByDesc('nama');
    }

    // Filter produk berdasarkan ascending (asc) atau descending (desc)

       $karyawanstaffs = $query->paginate(15);
        return view('role.hrd.karyawanstaff.karyawanstaffkadept.listkaryawan', compact('karyawanstaffs'));
    }

    public function store(Request $request){
        $karyawanstaff = new Karyawanstaff;
        $karyawanstaff->nama = $request->nama;
        $karyawanstaff->status = $request->status;
        $karyawanstaff->npk = $request->npk;
        $karyawanstaff->tmk = $request->tmk;
        $karyawanstaff->jabatan = $request->jabatan;
        $karyawanstaff->lokasi = $request->lokasi;
        $karyawanstaff->departement = $request->departement;
        $karyawanstaff->save();
        return redirect()->route('staffkadept.index');
    }

    public function edit($id){
        $karyawanstaff = Karyawanstaff::find($id);
        return view('role.hrd.karyawanstaff.karyawanstaffkadept.editkaryawan',compact('karyawanstaff'));
    }
    public function update(Request $request, $id){
        $karyawanstaff = Karyawanstaff::find($id);
        $karyawanstaff->nama = $request->nama;
        $karyawanstaff->status = $request->status;
        $karyawanstaff->npk = $request->npk;
        $karyawanstaff->tmk = $request->tmk;
        $karyawanstaff->jabatan = $request->jabatan;
        $karyawanstaff->lokasi = $request->lokasi;
        $karyawanstaff->departement = $request->departement;
        $karyawanstaff->save();
        return redirect()->route('staffkadept.index');
    }

}

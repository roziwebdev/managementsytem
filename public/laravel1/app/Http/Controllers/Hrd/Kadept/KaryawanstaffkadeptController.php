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

    if ($request->has('departement')) {
        $departementFilter = $request->input('departement');
        $query->where('departement', $departementFilter);
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

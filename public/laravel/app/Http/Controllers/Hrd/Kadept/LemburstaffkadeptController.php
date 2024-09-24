<?php

namespace App\Http\Controllers\Hrd\Kadept;

use App\Http\Controllers\Controller;
use App\Models\Karyawanstaff;
use App\Models\Lemburstaff;
use Illuminate\Http\Request;
use DateTime;

class LemburstaffkadeptController extends Controller
{
    public function indexapprove(Request $request){
    $query = Lemburstaff::query();
    $karyawanstaff = Karyawanstaff::all();
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
    if ($request->has('departement')) {
        $departement = $request->input('departement');
        if ($departement !== 'ALL') {
            // Gunakan JSON_CONTAINS untuk memeriksa apakah departemen yang diminta ada dalam data JSON
            $query->whereRaw('JSON_CONTAINS(departement, ?)', ['"' . $departement . '"']);
        }
    }

    // Terapkan paginasi jika tidak ada filter
    $lemburstaffs = $applyPagination ? $query->orderByDesc('id')->paginate(10) : $query->get();

    return view('role.hrd.lemburstaff.lemburstaffkadept.listapprove',compact('lemburstaffs','karyawanstaff','applyPagination'));
    }
    
    
    public function index1(Request $request){
    $query = Lemburstaff::query();
    $karyawanstaff = Karyawanstaff::all();
    $applyPagination = true; // Variable untuk menentukan apakah paginasi akan diterapkan
    $status = $request->input('status', null);
    // Filter berdasarkan pencarian ID atau produk
    if ($request->has('search')) {
        $searchValue = $request->input('search');

        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('namakaryawan', 'like', '%' . $searchValue . '%')
              ->orWhere('departement', 'like', '%' . $searchValue . '%');
        });
    }


    
    
    $userDepartement = auth()->user()->departement;
    $query->whereJsonContains('departement', $userDepartement);
    
    if ($status) {
        $query->where('status', $status);
        // Nonaktifkan paginasi jika ada filter status
        $applyPagination = false;
        // Urutkan secara ascending jika ada filter status
        $query->orderBy('id');
    }

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

    return view('role.hrd.lemburstaff.lemburstaffkadept.listlemburkadept',compact('lemburstaffs','karyawanstaff','applyPagination'));
    }
    
    public function index(Request $request){
    $query = Lemburstaff::query();
    $karyawanstaff = Karyawanstaff::all();
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

    // Filter berdasarkan rentang tanggal jika hanya tanggal yang diisi
    elseif ($request->has('tgl_mulai') && $request->has('tgl_akhir')) {
        $tglMulai = $request->input('tgl_mulai');
        $tglAkhir = $request->input('tgl_akhir');

        $query->whereBetween('tgllembur', [$tglMulai, $tglAkhir]);

        // Nonaktifkan paginasi jika ada filter
        $applyPagination = false;
    }
    
    if (!$request->filled('status') && !$request->filled('tgl_mulai') && !$request->filled('tgl_akhir') && !$request->filled('search')) {
        // Hanya menampilkan status "Waiting", "Waiting List", atau "Revisi"
        $query->whereIn('status', [ 'Waiting List', 'Revisi','Declined']);
    }

    // Terapkan paginasi jika tidak ada filter
    $lemburstaffs = $applyPagination ? $query->orderByDesc('id')->paginate(10) : $query->get();

        return view('role.hrd.lemburstaff.lemburstaffkadept.listlembur',compact('lemburstaffs','karyawanstaff','applyPagination'));
    }
    public function store(Request $request){
        $lemburstaff = new Lemburstaff;
        $lemburstaff->tgllembur = $request->tgllembur;
        $lemburstaff->departement = json_encode($request->departement);
        $lemburstaff->namakaryawan = json_encode($request->namakaryawan);
        $lemburstaff->jabatan = json_encode($request->jabatan);
        $lemburstaff->mulai = json_encode($request->mulai);
        $lemburstaff->istirahat = json_encode($request->istirahat);
        $lemburstaff->berakhir = json_encode($request->berakhir);
        
        $totalMenitArray = [];
    foreach ($request->mulai as $key => $mulai) {
        $mulaiObj = new DateTime($mulai);
        $berakhirObj = new DateTime($request->berakhir[$key]);
        $istirahat = $request->istirahat[$key]; // Waktu istirahat dalam menit
        $diff = $mulaiObj->diff($berakhirObj); // Selisih waktu mulai dan berakhir
        // Menghitung total menit
        $totalMenit = (($diff->h * 60) + $diff->i) - $istirahat;
        // Mengonversi total menit menjadi format "hh:mm"
        $totalJam = sprintf('%02d:%02d', floor($totalMenit / 60), $totalMenit % 60);
        // Menyimpan total jam ke dalam array
        $totalMenitArray[] = $totalJam;
    }
    // Mengencode total jam sebagai JSON
        $lemburstaff->totaljam = json_encode($totalMenitArray);
        $lemburstaff->pekerjaan = json_encode($request->pekerjaan);
        $lemburstaff->keteranganpekerjaan = json_encode($request->keteranganpekerjaan);
        $lemburstaff->hasillembur = json_encode($request->hasillembur);
        $lemburstaff->unit= json_encode($request->unit);
        $lemburstaff->pemberiperintah = $request->pemberiperintah;
        $lemburstaff->status = $request->status;
        $lemburstaff->save();
        return redirect()->back();
    }

    public function edit($id){
        $lemburstaff = Lemburstaff::find($id);
        return view('role.hrd.lemburstaff.lemburstaffkadept.editlembur',compact('lemburstaff'));
    }

    public function update(Request $request, $id){
        
        $lemburstaff = Lemburstaff::find($id);
        $lemburstaff->departement = json_encode($request->departement);
        $lemburstaff->namakaryawan = json_encode($request->namakaryawan);
        $lemburstaff->jabatan = json_encode($request->jabatan);
        $lemburstaff->mulai = json_encode($request->mulai);
        $lemburstaff->istirahat = json_encode($request->istirahat);
        $lemburstaff->berakhir = json_encode($request->berakhir);
        $totalMenitArray = [];
        foreach ($request->mulai as $key => $mulai) {
            $mulaiObj = new DateTime($mulai);
            $berakhirObj = new DateTime($request->berakhir[$key]);
            $istirahat = $request->istirahat[$key]; // Waktu istirahat dalam menit
            $diff = $mulaiObj->diff($berakhirObj); // Selisih waktu mulai dan berakhir
    
            // Menghitung total menit
            $totalMenit = (($diff->h * 60) + $diff->i) - $istirahat;
    
            // Mengonversi total menit menjadi format "hh:mm"
            $totalJam = sprintf('%02d:%02d', floor($totalMenit / 60), $totalMenit % 60);
    
            // Menyimpan total jam ke dalam array
            $totalMenitArray[] = $totalJam;
        }
    // Mengencode total jam sebagai JSON
        $lemburstaff->totaljam = json_encode($totalMenitArray);
        $lemburstaff->pekerjaan = json_encode($request->pekerjaan);
        $lemburstaff->keteranganpekerjaan = json_encode($request->keteranganpekerjaan);
        $lemburstaff->hasillembur = json_encode($request->hasillembur);
        $lemburstaff->unit= json_encode($request->unit);
        $lemburstaff->save();
        $request->session()->flash('success', 'Data lembur berhasil diperbarui.');
        return redirect()->back();
    }

    public function getdatakaryawan($kodekar)
    {
        $karyawanstaff = Karyawanstaff::where('nama', $kodekar)->first();
        if ($karyawanstaff) {
            return response()->json(['jabatan' => $karyawanstaff->jabatan, 'departement' => $karyawanstaff->departement]);
        } else {
            return response()->json(['error' => 'Data customer tidak ditemukan.'], 404);
        }
    }
    public function updateStatusstaffkadept(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $newNote = $request->input('note');
        $lembur = Lemburstaff::find($id); 
        if (!$lembur) {
            return redirect()->back()->with('error', 'Materialrequest tidak ditemukan.');
        }
        $lembur->status = $newStatus;
        $lembur->note = $newNote;
        $lembur->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    public function destroy($id){
        $lemburstaff = Lemburstaff::findOrFail($id);
        $lemburstaff->delete();
        return redirect()->back();
    }
}

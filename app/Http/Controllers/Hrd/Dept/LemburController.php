<?php

namespace App\Http\Controllers\Hrd\Dept;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Lembur;
use Illuminate\Http\Request;
use DateTime;

class LemburController extends Controller
{
    
    public function indexapprove(Request $request){
    $query = Lembur::query();
    $karyawan = Karyawan::all();
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
    $lemburs = $applyPagination ? $query->orderByDesc('id')->paginate(10) : $query->get();

    return view('role.hrd.lembur.lemburdept.listapprove', compact('lemburs', 'karyawan', 'applyPagination'));
    }
    
    
    public function indexdeclined(Request $request){
    // Memulai query pada model Lembur
    $query = Lembur::query();
    
    // Memeriksa apakah ada parameter pencarian dalam request
    if ($request->has('search')) {
        
        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('namakaryawan', 'like', '%' . $searchValue . '%')
              ->orWhere('departement', 'like', '%' . $searchValue . '%');
        });
    }

    // Mengurutkan hasil query berdasarkan id secara descending
    $query->orderByDesc('id');

    // Menambahkan kondisi untuk status 'Declined'
    $query->where('status', 'Declined');

    // Melakukan paginasi hasil query
    $lemburs = $query->paginate(10);
    
    // Mengembalikan tampilan dengan data lembur yang telah difilter
    return view('role.hrd.lembur.lemburdept.listdeclined', compact('lemburs'));
}
    public function indexrevisi(Request $request){
    // Memulai query pada model Lembur
    $query = Lembur::query();
    
    // Memeriksa apakah ada parameter pencarian dalam request
    if ($request->has('search')) {
        
        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('namakaryawan', 'like', '%' . $searchValue . '%')
              ->orWhere('departement', 'like', '%' . $searchValue . '%');
        });
    }

    // Mengurutkan hasil query berdasarkan id secara descending
    $query->orderByDesc('id');

    // Menambahkan kondisi untuk status 'Declined'
    $query->where('status', 'Revisi');

    // Melakukan paginasi hasil query
    $lemburs = $query->paginate(10);
    
    // Mengembalikan tampilan dengan data lembur yang telah difilter
    return view('role.hrd.lembur.lemburdept.listrevisi', compact('lemburs'));
}
    
    
    public function index1(Request $request){
    $query = Lembur::query();
    $karyawan = Karyawan::all();
    $applyPagination = true; // Variable untuk menentukan apakah paginasi akan diterapkan
    
       $status = $request->input('status', null);
        if ($status) {
            $query->where('status', $status);
        }
         
        $departement = $request->input('departement', null);
        if ($departement) {
        // Gunakan whereJsonContains untuk mencari nilai di dalam kolom JSON
        $query->whereJsonContains('departement', $departement);
    }


    // Filter berdasarkan pencarian ID atau produk
    if ($request->has('search')) {
        $searchValue = $request->input('search');

        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('namakaryawan', 'like', '%' . $searchValue . '%')
              ->orWhere('departement', 'like', '%' . $searchValue . '%');
        });
    }

    


    // Terapkan pengurutan berdasarkan ID secara descending
    $query->orderByDesc('id');
    
    $query->whereIn('status', ['Waiting List','Revisi','Declined','Approve']);

    
    
     if ($request->has('tgl_mulai') && $request->has('tgl_akhir')) {
        $tglMulai = $request->input('tgl_mulai');
        $tglAkhir = $request->input('tgl_akhir');
        
        $query->where('status', 'Approve')
              ->whereBetween('tgllembur', [$tglMulai, $tglAkhir]);
        $applyPagination = false;
    }

    // Terapkan paginasi jika tidak ada filter
    $lemburs = $applyPagination ? $query->paginate(10) : $query->get();


    return view('role.hrd.lembur.lemburdept.listlemburhrd',compact('lemburs','karyawan','applyPagination','status'));
    }
    
    public function index(Request $request){
    $query = Lembur::query();
    $karyawan = Karyawan::all();
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
      $userDepartement = auth()->user()->departement;
    $query->whereJsonContains('departement', $userDepartement);
    $status = $request->input('status', null);
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
    $lemburs = $applyPagination ? $query->paginate(5) : $query->get();


        return view('role.hrd.lembur.lemburdept.listlembur',compact('lemburs','karyawan','applyPagination')); 
    }
    
    public function store(Request $request){
        // Validasi jika namakaryawan sudah diinput di hari yang sama
        foreach ($request->namakaryawan as $namakaryawan) {
            $existingLembur = Lembur::where('namakaryawan', 'like', '%' . $namakaryawan . '%')
                ->whereDate('tgllembur', $request->tgllembur)
                ->first();
    
            if ($existingLembur) {
                return redirect()->back()->withErrors(['namakaryawan' => 'Karyawan ' . $namakaryawan . ' sudah diinput pada hari ini.']);
            }
        }
    
        // Proses penyimpanan data
        $lembur = new Lembur;
        $lembur->tgllembur = $request->tgllembur;
        $lembur->departement = json_encode($request->departement);
        $lembur->namakaryawan = json_encode($request->namakaryawan);
        $lembur->jabatan = json_encode($request->jabatan);
        $lembur->mulai = json_encode($request->mulai);
        $lembur->istirahat = json_encode($request->istirahat);
        $lembur->berakhir = json_encode($request->berakhir);
        
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
        $lembur->totaljam = json_encode($totalMenitArray);
        $lembur->pekerjaan = json_encode($request->pekerjaan);
        $lembur->keteranganpekerjaan = json_encode($request->keteranganpekerjaan);
        $lembur->hasillembur = json_encode($request->hasillembur);
        $lembur->unit= json_encode($request->unit);
        $lembur->pemberiperintah = $request->pemberiperintah;
        $lembur->status = $request->status;
        $lembur->save();
        
        return redirect()->back();
    }

    public function edit($id){
        $lembur = Lembur::find($id);
        return view('role.hrd.lembur.lemburdept.editlembur',compact('lembur'));
    }

    public function update(Request $request, $id){
        $lembur = Lembur::find($id);
        $lembur->departement = json_encode($request->departement);
        $lembur->namakaryawan = json_encode($request->namakaryawan);
        $lembur->jabatan = json_encode($request->jabatan);
        $lembur->mulai = json_encode($request->mulai);
        $lembur->istirahat = json_encode($request->istirahat);
        $lembur->berakhir = json_encode($request->berakhir);
        
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
        $lembur->totaljam = json_encode($totalMenitArray);
        $lembur->pekerjaan = json_encode($request->pekerjaan);
        $lembur->keteranganpekerjaan = json_encode($request->keteranganpekerjaan);
        $lembur->hasillembur = json_encode($request->hasillembur);
        $lembur->unit= json_encode($request->unit);
        $lembur->save();
        $request->session()->flash('success', 'Data lembur berhasil diperbarui.');
        return redirect()->back();
    }

    public function getdatakaryawan($kodekar)
    {
        $karyawan = Karyawan::where('nama', $kodekar)->first();
        if ($karyawan) {
            return response()->json(['jabatan' => $karyawan->jabatan, 'departement' => $karyawan->departement]);
        } else {
            return response()->json(['error' => 'Data customer tidak ditemukan.'], 404);
        }
    }
    
    public function destroy($id){
        $lembur = Lembur::findOrFail($id);
        $lembur-> delete();
        return redirect()->back();
    }
    
    public function updateStatusdepthrd(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $newNote = $request->input('note');
        $lembur = Lembur::find($id);
        if (!$lembur) {
            return redirect()->back()->with('error', 'Materialrequest tidak ditemukan.');
        }
        $lembur->status = $newStatus;
        $lembur->note = $newNote;
        $lembur->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
}

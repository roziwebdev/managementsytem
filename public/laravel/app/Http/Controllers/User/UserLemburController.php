<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Lembur;
use Illuminate\Http\Request;
use DateTime;

class UserLemburController extends Controller
{
     public function index(Request $request){

    $query = Lembur::query();
    $karyawan = Karyawan::all();
    $applyPagination = true;
    // Pencarian berdasarkan ID atau produk
    if ($request->has('search')) {
        $searchValue = $request->input('search');

        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('namakaryawan', 'like', '%' . $searchValue . '%')
              ->orWhere('departement', 'like', '%' . $searchValue . '%');
        });
    }

     if ($request->has('status') && $request->has('tgl_mulai') && $request->has('tgl_akhir')) {
        $statusFilter = $request->input('status');
        $tglMulai = $request->input('tgl_mulai');
        $tglAkhir = $request->input('tgl_akhir');
        $query->where('status', $statusFilter)
              ->whereBetween('tgllembur', [$tglMulai, $tglAkhir]);

        // Nonaktifkan paginasi jika ada filter
        $applyPagination = false;
    }

    // Filter berdasarkan status jika hanya status yang diisi
    elseif ($request->has('status') && empty($request->input('tgl_mulai')) && empty($request->input('tgl_akhir'))) {
        $statusFilter = $request->input('status');
        $query->where('status', $statusFilter);

        // Nonaktifkan paginasi jika ada filter
        $applyPagination = false;
    }

    // Filter berdasarkan rentang tanggal jika hanya tanggal yang diisi
    elseif ($request->has('tgl_mulai') && $request->has('tgl_akhir')) {
        $tglMulai = $request->input('tgl_mulai');
        $tglAkhir = $request->input('tgl_akhir');
        $query->whereBetween('tgllembur', [$tglMulai, $tglAkhir]);
        // Nonaktifkan paginasi jika ada filter
        $applyPagination = false;
    }

    // Ambil data berdasarkan query yang telah dibuat
    $lemburs = $applyPagination ? $query->orderBy('id', 'desc')->paginate(10)  : $query->get();
        return view('role.user.lembur.listlembur',compact('lemburs','karyawan', 'applyPagination'));
    }
    public function store(Request $request){
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
        return redirect()->route('spluser.index');
    }

    public function edit($id){
        $lembur = Lembur::find($id);
        return view('role.user.lembur.editlembur', compact('lembur'));
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
        
        $lembur->keteranganpekerjaan = json_encode($request->keteranganpekerjaan);
        $lembur->hasillembur = json_encode($request->hasillembur);
        $lembur->unit= json_encode($request->unit);
        $lembur->save();
        return redirect()->route('spluser.index');
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
}

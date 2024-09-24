<?php

namespace App\Http\Controllers\Hrd\Dept;

use App\Http\Controllers\Controller;
use App\Models\Lembursatpam;
use App\Models\Satpam;
use DateTime;
use Illuminate\Http\Request;

class Lembursatpamcontroller extends Controller
{

    public function index(Request $request){

        $query = Lembursatpam::query();
        $satpam = Satpam::all();
            // Filter berdasarkan pencarian ID atau produk
            if ($request->has('search')) {
                $searchValue = $request->input('search');

                $query->where(function($q) use ($searchValue) {
                    $q->where('id', $searchValue)
                    ->orWhere('namakaryawan', 'like', '%' . $searchValue . '%')
                    ->orWhere('departement', 'like', '%' . $searchValue . '%');
                });
            }
            $status = $request->input('status', null);
                if ($status) {
                    $query->where('status', $status);
            }
            $departement = $request->input('departement', null);
                if ($departement) {
                // Gunakan whereJsonContains untuk mencari nilai di dalam kolom JSON
                $query->whereJsonContains('departement', $departement);
            }

    // Terapkan paginasi jika tidak ada filter
        $lemburs =  $query->orderByDesc('id')->paginate(10) ;
        return view('role.hrd.lembursatpam.lemburdept.listlembursatpam', compact('lemburs', 'satpam','status'));
    }
    
    public function store (Request $request){
        $lembursatpam = new Lembursatpam();
        $lembursatpam->tgllembur = $request->tgllembur;
        $lembursatpam->namakaryawan = json_encode($request->namakaryawan);
        $lembursatpam->jabatan = json_encode($request->jabatan);
        $lembursatpam->outsourcing = json_encode($request->outsourcing);
        $lembursatpam->mulai = json_encode($request->mulai);
        $lembursatpam->istirahat = json_encode($request->istirahat);
        $lembursatpam->berakhir = json_encode($request->berakhir);
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
        $lembursatpam->totaljam = json_encode($totalMenitArray);
        $lembursatpam->pekerjaan = json_encode($request->pekerjaan);
        $lembursatpam->keteranganpekerjaan = json_encode($request->keteranganpekerjaan);
        $lembursatpam->pemberiperintah = $request->pemberiperintah;
        $lembursatpam->status = $request->status;
        $lembursatpam->save();
        return redirect()->route('lembursatpam.index');
    }

    public function edit($id){
        $lembur = Lembursatpam::find($id);
        return view('role.hrd.lembursatpam.lemburdept.editlembursatpam', compact('lembur'));
    }

    public function update (Request $request, $id){
        $lembursatpam = Lembursatpam::find($id);
        $lembursatpam->tgllembur = $request->tgllembur;
        $lembursatpam->namakaryawan = json_encode($request->namakaryawan);
        $lembursatpam->jabatan = json_encode($request->jabatan);
        $lembursatpam->outsourcing = json_encode($request->outsourcing);
        $lembursatpam->mulai = json_encode($request->mulai);
        $lembursatpam->istirahat = json_encode($request->istirahat);
        $lembursatpam->berakhir = json_encode($request->berakhir);
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
        $lembursatpam->totaljam = json_encode($totalMenitArray);
        $lembursatpam->pekerjaan = json_encode($request->pekerjaan);
        $lembursatpam->keteranganpekerjaan = json_encode($request->keteranganpekerjaan);

        $lembursatpam->save();
        $request->session()->flash('success', 'Data lembur berhasil diperbarui.');

        return redirect()->route('lembursatpam.index');
    }

        public function getdatakaryawansatpam($kodekar)
    {
        $satpam = Satpam::where('nama', $kodekar)->first();
        if ($satpam) {
            return response()->json(['jabatan' => $satpam->jabatan, 'outsourcing' => $satpam->outsourcing]);
        } else {
            return response()->json(['error' => 'Data customer tidak ditemukan.'], 404);
        }
    }
     public function updateStatuskadept(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $newNote = $request->input('note');
        $lembursatpam = Lembursatpam::find($id);
        if (!$lembursatpam) {
            return redirect()->back()->with('error', 'Materialrequest tidak ditemukan.');
        }
        $lembursatpam->status = $newStatus;
        $lembursatpam->note = $newNote;
        $lembursatpam->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function destroy($id){
        $lembursatpam = Lembursatpam::findOrFail($id);
        $lembursatpam-> delete();
        return redirect()->back();
    }
}

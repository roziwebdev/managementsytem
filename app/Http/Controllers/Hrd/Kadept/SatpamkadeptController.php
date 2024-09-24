<?php

namespace App\Http\Controllers\Hrd\Kadept;

use App\Http\Controllers\Controller;
use App\Models\Satpam;
use Illuminate\Http\Request;

class SatpamkadeptController extends Controller
{
    public function index(Request $request){
    $query = Satpam::query();
    // Pencarian berdasarkan ID atau produk
        if ($request->has('search')) {
            $searchValue = $request->input('search');
                $query->where(function ($q) use ($searchValue) {
                    $q->where('id', $searchValue)
                        ->orWhere('nama', 'like', '%' . $searchValue . '%');
            });
        }
        $status = $request->input('status', null);
        if ($status) {
            $query->where('status', $status);
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
            // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan product secara ascending
            $query->orderBy('nama');
        } elseif ($sortBy == 'descnama') {
            // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan product secara descending
            $query->orderByDesc('nama');
        }
        // Ambil data berdasarkan query yang telah dibuat
        $satpams = $query->paginate(15);
        return view('role.hrd.karyawansatpam.karyawansatpamkadept.listsatpam', compact('satpams'));
    }

    public function store(Request $request){
        $satpam = new Satpam();
        $satpam->nama = $request->nama;
        $satpam->outsourcing = $request->outsourcing;
        $satpam->status = $request->status;
        $satpam->tmk = $request->tmk;
        $satpam->jabatan = $request->jabatan;
        $satpam->lokasi = $request->lokasi;
        $satpam->save();
        return redirect()->route('satpamkadept.index');
    }

    public function edit($id){
        $satpam = Satpam::find($id);
        return view('role.hrd.karyawansatpam.karyawansatpamkadept.editsatpam', compact('satpam'));
    }

    public function update(Request $request, $id){
        $satpam = Satpam::find($id);
        $satpam->nama = $request->nama;
        $satpam->outsourcing = $request->outsourcing;
        $satpam->jabatan = $request->jabatan;
        $satpam->status = $request->status;
        $satpam->tmk = $request->tmk;
        $satpam->lokasi = $request->lokasi;
        $satpam->save();
        return redirect()->route('satpamkadept.index');
    }

}

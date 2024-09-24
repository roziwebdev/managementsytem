<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Nama;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function getAlamat($namaId)
    {
        $nama = Nama::findOrFail($namaId);
        $alamats = Alamat::where('nama_id', $namaId)->get();
        return response()->json(['alamats' => $alamats]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'alamat' => 'required',
            'nama_id' => 'required|exists:namas,id',
        ]);

        $alamat = new Alamat();
        $alamat->alamat = $request->alamat;
        $alamat->nama_id = $request->nama_id;
        $alamat->save();

        return response()->json(['alamat' => $alamat->alamat], 200);
    }
}

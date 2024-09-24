<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('vendorindex');
    }

    /**
     * Show the form for creating a new resource.
     */
        public function createekp()
    {
        return view('vendorcreateekp');
    }

    public function createpp()
    {
        return view('vendorcreatepp');
    }
    public function create3()
    {
        return view('vendorcreate3');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Vendor;
        $user->type = $request->type;
        $user->namavendor = $request->namavendor;
        $user->alamatvendor = $request->alamatvendor;
        $user->penanggungjawab = $request->penanggungjawab;
        $user->cp = $request->cp;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->top = $request->top;
        $user->bank = $request->bank;
        $user->norek = $request->norek;
        $user->bankaddress = $request->bankaddress;
        $user->others = $request->others;
        $user->leadtime = $request->leadtime;
        $user->gps = $request->gps;
        $user->asuransi = $request->asuransi;
        $user->driver = $request->driver;
        $user->kosong1 = $request->kosong1;
        $user->kosong2 = $request->kosong2;
        $user->kosong3 = $request->kosong3;
        $user->jenisygdisupply = json_encode($request->jenisygdisupply);
        $user->toleransijenis = json_encode($request->toleransijenis);
        $user->unittype = json_encode($request->unittype);
        $user->unitqty = json_encode($request->unitqty);
        $user->capacitycbmmin = json_encode($request->capacitycbmmin);
        $user->capacitycbmmax = json_encode($request->capacitycbmmax);
        $user->capacitytonmin = json_encode($request->capacitytonmin);
        $user->capacitytonmax = json_encode($request->capacitytonmax);
        $user->price = json_encode($request->price);
        $user->tujuan = json_encode($request->tujuan);



        $user->tujuanunit = $request->tujuanunit;

        $user->leadtime = $request->leadtime;

        // Handle file uploads
        if ($request->hasFile('imagenib')) {
            $imagenib = $request->file('imagenib');
            $imagenibName = $imagenib->getClientOriginalName();
            $imagenib->move(public_path('images'), $imagenibName);
            $user->imagenib = $imagenibName;
        }

        if ($request->hasFile('imagenpwp')) {
            $imagenpwp = $request->file('imagenpwp');
            $imagenpwpName = $imagenpwp->getClientOriginalName();
            $imagenpwp->move(public_path('images'), $imagenpwpName);
            $user->imagenpwp = $imagenpwpName;
        }

        if ($request->hasFile('imageidpic')) {
            $imageidpic = $request->file('imageidpic');
            $imageidpicName = $imageidpic->getClientOriginalName();
            $imageidpic->move(public_path('images'), $imageidpicName);
            $user->imageidpic = $imageidpicName;
        }

        if ($request->hasFile('imageipricelist')) {
            $imageipricelist = $request->file('imageipricelist');
            $imageipricelistName = $imageipricelist->getClientOriginalName();
            $imageipricelist->move(public_path('images'), $imageipricelistName);
            $user->imageipricelist = $imageipricelistName;
        }

        if ($request->has('signatureData')) {
            // Data tanda tangan dari client-side (biasanya dalam bentuk gambar base64)
            $signatureData = $request->input('signatureData');

            // Konversi data tanda tangan ke gambar dan simpan
            $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
            $signatureData = str_replace(' ', '+', $signatureData);
            $signatureFileName = 'signature_' . time() . '.png'; // Nama berkas tanda tangan
            $signaturePath = public_path('images/' . $signatureFileName);

            // Simpan gambar tanda tangan
            file_put_contents($signaturePath, base64_decode($signatureData));

            // Simpan nama berkas tanda tangan ke basis data
            $user->imagettd = $signatureFileName;
        }
        $user->save();

        return redirect()->route('vendor.index')->with('success', 'Product Added Successfully');
    }



    public function storeekp(Request $request)
    {
        $user = new Vendor;
        $user->type = $request->type;
        $user->namavendor = $request->namavendor;
        $user->alamatvendor = $request->alamatvendor;
        $user->penanggungjawab = $request->penanggungjawab;
        $user->cp = $request->cp;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->top = $request->top;
        $user->bank = $request->bank;
        $user->norek = $request->norek;
        $user->bankaddress = $request->bankaddress;
        $user->others = $request->others;
        $user->leadtime = $request->leadtime;
        $user->gps = $request->gps;
        $user->asuransi = $request->asuransi;
        $user->driver = $request->driver;
        $user->kosong1 = $request->kosong1;
        $user->kosong2 = $request->kosong2;
        $user->kosong3 = $request->kosong3;
        $user->jenisygdisupply = json_encode($request->jenisygdisupply);
        $user->toleransijenis = json_encode($request->toleransijenis);
        $user->unittype = json_encode($request->unittype);
        $user->unitqty = json_encode($request->unitqty);
        $user->capacitycbmmin = json_encode($request->capacitycbmmin);
        $user->capacitycbmmax = json_encode($request->capacitycbmmax);
        $user->capacitytonmin = json_encode($request->capacitytonmin);
        $user->capacitytonmax = json_encode($request->capacitytonmax);
        $user->price = json_encode($request->price);
        $user->tujuan = json_encode($request->tujuan);
        $user->tujuanunit = json_encode($request->tujuanunit);



        $user->tujuanunit = $request->tujuanunit;

        $user->leadtime = $request->leadtime;

        // Handle file uploads
        if ($request->hasFile('imagenib')) {
            $imagenib = $request->file('imagenib');
            $imagenibName = $imagenib->getClientOriginalName();
            $imagenib->move(public_path('images'), $imagenibName);
            $user->imagenib = $imagenibName;
        }

        if ($request->hasFile('imagenpwp')) {
            $imagenpwp = $request->file('imagenpwp');
            $imagenpwpName = $imagenpwp->getClientOriginalName();
            $imagenpwp->move(public_path('images'), $imagenpwpName);
            $user->imagenpwp = $imagenpwpName;
        }

        if ($request->hasFile('imageidpic')) {
            $imageidpic = $request->file('imageidpic');
            $imageidpicName = $imageidpic->getClientOriginalName();
            $imageidpic->move(public_path('images'), $imageidpicName);
            $user->imageidpic = $imageidpicName;
        }

        if ($request->hasFile('imageipricelist')) {
            $imageipricelist = $request->file('imageipricelist');
            $imageipricelistName = $imageipricelist->getClientOriginalName();
            $imageipricelist->move(public_path('images'), $imageipricelistName);
            $user->imageipricelist = $imageipricelistName;
        }

        if ($request->has('signatureData')) {
            // Data tanda tangan dari client-side (biasanya dalam bentuk gambar base64)
            $signatureData = $request->input('signatureData');

            // Konversi data tanda tangan ke gambar dan simpan
            $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
            $signatureData = str_replace(' ', '+', $signatureData);
            $signatureFileName = 'signature_' . time() . '.png'; // Nama berkas tanda tangan
            $signaturePath = public_path('images/' . $signatureFileName);

            // Simpan gambar tanda tangan
            file_put_contents($signaturePath, base64_decode($signatureData));

            // Simpan nama berkas tanda tangan ke basis data
            $user->imagettd = $signatureFileName;
        }
        $user->save();

        return redirect()->route('vendor.editekp', ['id' => $user->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editekp(Vendor $vendor, $id)
    {
        $vendorekp = Vendor::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$vendorekp) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('vendorcreateekpprice', ['vendorekp' => $vendorekp]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $user = Vendor::find($id);
        $user->type = $request->type;
        $user->namavendor = $request->namavendor;
        $user->alamatvendor = $request->alamatvendor;
        $user->penanggungjawab = $request->penanggungjawab;
        $user->cp = $request->cp;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->top = $request->top;
        $user->bank = $request->bank;
        $user->norek = $request->norek;
        $user->bankaddress = $request->bankaddress;
        $user->others = $request->others;
        $user->leadtime = $request->leadtime;
        $user->gps = $request->gps;
        $user->asuransi = $request->asuransi;
        $user->driver = $request->driver;
        $user->kosong1 = $request->kosong1;
        $user->kosong2 = $request->kosong2;
        $user->kosong3 = $request->kosong3;
        $user->jenisygdisupply = json_encode($request->jenisygdisupply);
        $user->toleransijenis = json_encode($request->toleransijenis);
        $user->unittype = json_encode($request->unittype);
        $user->unitqty = json_encode($request->unitqty);
        $user->capacitycbmmin = json_encode($request->capacitycbmmin);
        $user->capacitycbmmax = json_encode($request->capacitycbmmax);
        $user->capacitytonmin = json_encode($request->capacitytonmin);
        $user->capacitytonmax = json_encode($request->capacitytonmax);
        $user->price = json_encode($request->price);
        $user->tujuan = json_encode($request->tujuan);
        $user->tujuanunit = json_encode($request->tujuanunit);



        $user->tujuanunit = $request->tujuanunit;

        $user->leadtime = $request->leadtime;

        // Handle file uploads
        if ($request->hasFile('imagenib')) {
            $imagenib = $request->file('imagenib');
            $imagenibName = $imagenib->getClientOriginalName();
            $imagenib->move(public_path('images'), $imagenibName);
            $user->imagenib = $imagenibName;
        }

        if ($request->hasFile('imagenpwp')) {
            $imagenpwp = $request->file('imagenpwp');
            $imagenpwpName = $imagenpwp->getClientOriginalName();
            $imagenpwp->move(public_path('images'), $imagenpwpName);
            $user->imagenpwp = $imagenpwpName;
        }

        if ($request->hasFile('imageidpic')) {
            $imageidpic = $request->file('imageidpic');
            $imageidpicName = $imageidpic->getClientOriginalName();
            $imageidpic->move(public_path('images'), $imageidpicName);
            $user->imageidpic = $imageidpicName;
        }

        if ($request->hasFile('imageipricelist')) {
            $imageipricelist = $request->file('imageipricelist');
            $imageipricelistName = $imageipricelist->getClientOriginalName();
            $imageipricelist->move(public_path('images'), $imageipricelistName);
            $user->imageipricelist = $imageipricelistName;
        }

        if ($request->has('signatureData')) {
            // Data tanda tangan dari client-side (biasanya dalam bentuk gambar base64)
            $signatureData = $request->input('signatureData');

            // Konversi data tanda tangan ke gambar dan simpan
            $signatureData = str_replace('data:image/png;base64,', '', $signatureData);
            $signatureData = str_replace(' ', '+', $signatureData);
            $signatureFileName = 'signature_' . time() . '.png'; // Nama berkas tanda tangan
            $signaturePath = public_path('images/' . $signatureFileName);

            // Simpan gambar tanda tangan
            file_put_contents($signaturePath, base64_decode($signatureData));

            // Simpan nama berkas tanda tangan ke basis data
            $user->imagettd = $signatureFileName;
        }
        $user->save();
        return redirect()->route('vendor.index')->with('success', 'Product Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}

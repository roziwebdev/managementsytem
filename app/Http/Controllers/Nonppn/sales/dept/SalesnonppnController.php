<?php

namespace App\Http\Controllers\Nonppn\sales\dept;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Plant;
use App\Models\Productsales;
use App\Models\Sales;
use App\Models\Salesnonppn;
use App\Models\Tender;
use Illuminate\Http\Request;

class SalesnonppnController extends Controller
{
     public function index(Request $request) {
    $query = Salesnonppn::query();
    $salesexports = Salesnonppn::all();
    $plants = Plant::all();
    $tenders = Tender::all();
    $cust = Customer::all();
    $productsales = Productsales::all();
    // Pencarian berdasarkan ID atau produk
    if ($request->has('search')) {
        $searchValue = $request->input('search');
        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('product', 'like', '%' . $searchValue . '%')
              ->orWhere('customer', 'like', '%' . $searchValue . '%')
              ->orWhere('tender', 'like', '%' . $searchValue . '%')
              ->orWhere('referensi', 'like', '%' . $searchValue . '%');
        });
    }
    $statussc = $request->input('statussc', null);
    if ($statussc) {
        $query->where('statussc', $statussc);
    }
    // Filter produk berdasarkan ascending (asc) atau descending (desc)
    $sortBy = $request->input('sort_by', null);
    if (!$sortBy) {
        // Jika tidak ada query pencarian, urutkan berdasarkan updated_at terbaru
        $query->orderByDesc('id');
    } elseif ($sortBy == 'asc') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
        $query->orderBy('id');
    } elseif ($sortBy == 'desc') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
        $query->orderByDesc('id');
    }
    // Ambil data berdasarkan query yang telah dibuat
    $salescontract = $query->paginate(20);
    return view('role.nonppn.sales.salesdept.salescontract.listsales', compact('plants','salescontract', 'cust','productsales','tenders','salesexports'));
}




    public function show(Sales $sales, $id)
    {
        $details = Sales::find($id);
        return view('role.nonppn.sales.salesdept.salescontract.show', compact('details'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        // Mengambil nilai qty dan price dari permintaan
        $qty = $request->qty;
        $price = $request->price;

        // Menghitung total
        $total = [];
        foreach ($qty as $key => $value) {
            // Memastikan ada nilai qty dan price yang sesuai
            if (isset($qty[$key]) && isset($price[$key])) {
                $total[$key] = $qty[$key] * $price[$key];
            }
        }
         $numericTotal = array_map('intval', $total);

        $sales = new Salesnonppn;
        $sales->po = $request->po;
        $sales->tanggalpo = $request->tanggalpo;
        $sales->scode = $request->scode;
        $sales->customer = $request->customer;
        $sales->address = $request->address;
        $sales->up = $request->up;
        $sales->plantcode = $request->plantcode;
        $sales->product = json_encode($request->product);
        $sales->idplant = json_encode($request->idplant);
        $sales->referensi = json_encode($request->referensi);
        $sales->sap = json_encode($request->sap);
        $sales->material = json_encode($request->material);
        $sales->specs = json_encode($request->specs);
        $sales->size = json_encode($request->size);
        $sales->finishing = json_encode($request->finishing);
        $sales->etauser = json_encode($request->etauser);
        $sales->qty = json_encode($request->qty);
        $sales->qty = json_encode($qty);
        $sales->unit = json_encode($request->unit);
        $sales->price = json_encode($price);
        $sales->total = json_encode($numericTotal);
        $sales->toleransi = json_encode($request->toleransi);
        $sales->notesc = json_encode($request->notesc);
        $sales->jobsc = json_encode($request->jobsc);
        $sales->statusproduct = json_encode($request->statusproduct);
        $sales->job = $request->job;
        $sales->dp = $request->dp;
        $sales->statusjob = $request->statusjob;
        $sales->selisih = $request->selisih;
        $sales->jumlahkirim = $request->jumlahkirim;
        $sales->nosj = $request->nosj;
        $sales->statussc = $request->statussc;
        $sales->persen = $request->persen;
        $sales->keterangancust = $request->keterangancust;
        $sales->keteranganpembayaran = $request->keteranganpembayaran;
        $sales->noteeksternal = $request->noteeksternal;
        $sales->tender = $request->tender;
        $sales->etapilihan = $request->etapilihan;
        $sales->sellerowner = $request->sellerowner;

        if ($request->hasFile('filepo')) {
        // Get file name with extension
        $fileNameWithExt = $request->file('filepo')->getClientOriginalName();
        // Get just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get just extension
        $extension = $request->file('filepo')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        // Upload file
        $path = $request->file('filepo')->storeAs('public/path/to/your/image/', $fileNameToStore);
        // Set file path in the database
        $sales->filepo = $fileNameToStore;
    }

        if ($request->hasFile('filehitunganharga')) {
        // Get file name with extension
        $fileNameWithExt = $request->file('filehitunganharga')->getClientOriginalName();
        // Get just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get just extension
        $extension = $request->file('filehitunganharga')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        // Upload file
        $path = $request->file('filehitunganharga')->storeAs('public/path/to/your/image/', $fileNameToStore);
        // Set file path in the database
        $sales->filehitunganharga = $fileNameToStore;
    }

        if ($request->has('canvasImage')) {
        // Simpan data gambar dari input canvasImage ke file
        $data = $request->canvasImage;
        $fileNameToStore = 'canvas_' . time() . '.png'; // Buat nama file baru
        $path = storage_path('app/public/path/to/your/image/') . $fileNameToStore; // Tentukan lokasi penyimpanan file
        // Simpan data gambar ke file
        file_put_contents($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data)));
        // Set file path dalam model Sales
        $sales->fileponoprice = $fileNameToStore;
    }
        $sales->save();

         $soldQuantities = [];

        // Menghitung total quantity yang terjual untuk setiap nama produk dan referensi
        foreach ($request->referensi as $index => $referensi) {
            $sap = $request->sap[$index];
            $idplant = $request->idplant[$index];
            $key = $referensi . '_' . $sap . '_' . $idplant;

            // Jika kombinasi referensi, sap, dan idplant belum ada dalam array, inisialisasikan dengan 0
            if (!isset($soldQuantities[$key])) {
                $soldQuantities[$key] = 0;
            }

            // Ambil jumlah yang dijual dari JSON encoded qty
            $quantitySold = $request->qty[$index];
            // Tambahkan ke total quantity yang terjual untuk referensi, sap, dan idplant ini
            $soldQuantities[$key] += $quantitySold;
        }

        // Kurangi sisaquantity di Model Tender berdasarkan nama produk dan referensi yang terjual
        foreach ($soldQuantities as $key => $totalSold) {
            [$referensi, $sap, $idplant] = explode('_', $key);

            // Temukan Model Tender berdasarkan nama produk dan referensi
            $tender = Tender::where('referensi', $referensi)
                            ->where('sap', $sap)
                            ->where('idplant', $idplant)
                            ->first();

            // Kurangi sisaquantity
            if ($tender) {
                // Kurangi sisaquantity dengan total yang terjual
                $tender->sisa -= $totalSold;
                // Pastikan nilai sisaquantity tidak negatif
                if ($tender->sisa < 0) {
                    $tender->sisa = 0;
                }
                $tender->save();
            }
        }

        return redirect()->route('salesnonppndept.index');
    }

    public function getdatacust($kodecust)
{
    $customer = Customer::where('customer', $kodecust)->first();

    if ($customer) {
        return response()->json(['up' => $customer->up,'npwp' => $customer->npwp, 'id' => $customer->id, 'address' => $customer->address]);
    } else {
        return response()->json(['error' => 'Data customer tidak ditemukan.'], 404);
    }
}
    public function getdataplant($plant)
    {
        $plants = Plant::where('plant', $plant)->first();

        if ($plants) {
            return response()->json(['kodeplant' => $plants->kodeplant, 'address' => $plants->address, 'id' => $plants->id]);
        } else {
            return response()->json(['error' => 'Data customer tidak ditemukan.'], 404);
        }
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salesnonppn $sales,$id)
    {
        $plants = Plant::all();
        $tenders = Tender::all();
        $cust = Customer::all();
        $salescontract = Salesnonppn::find($id);
        return view('role.nonppn.sales.salesdept.salescontract.edit', compact('plants','cust','tenders','salescontract'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
        $sales = Salesnonppn::find($id);
        $oldImageOrPdf = $sales->filepo;
        $oldImageOrPdf2 = $sales->fileponoprice;
        $sales->po = $request->po;
        $sales->tanggalpo = $request->tanggalpo;
        $sales->scode = $request->scode;
        $sales->customer = $request->customer;
        $sales->address = $request->address;
        $sales->up = $request->up;
        $sales->plantcode = $request->plantcode;
        $sales->product = json_encode($request->product);
        $sales->sap = json_encode($request->sap);
        $sales->material = json_encode($request->material);
        $sales->specs = json_encode($request->specs);
        $sales->size = json_encode($request->size);
        $sales->finishing = json_encode($request->finishing);
        $sales->qty = json_encode($request->qty);
        $sales->unit = json_encode($request->unit);
        $sales->price = json_encode($request->price);
        $sales->total = json_encode($request->total);
        $sales->etauser = json_encode($request->etauser);
        $sales->toleransi = json_encode($request->toleransi);
        $sales->notesc = json_encode($request->notesc);
        $sales->statusproduct = json_encode($request->statusproduct);
        $sales->job = $request->job;
        $sales->dp = $request->dp;
        $sales->statusjob = $request->statusjob;
        $sales->selisih = $request->selisih;
        $sales->jumlahkirim = $request->jumlahkirim;
        $sales->nosj = $request->nosj;
        $sales->statussc = $request->statussc;
        $sales->persen = $request->persen;
        $sales->keterangancust = $request->keterangancust;
        $sales->keteranganpembayaran = $request->keteranganpembayaran;
        $sales->noteeksternal = $request->noteeksternal;
        $sales->tender = $request->tender;
        $sales->etapilihan = $request->etapilihan;
        $sales->sellerowner = $request->sellerowner;
        $sales->referensi = json_encode($request->referensi);

        if ($request->hasFile('filepo')) {
        // Get file name with extension
        $fileNameWithExt = $request->file('filepo')->getClientOriginalName();
        // Get just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get just extension
        $extension = $request->file('filepo')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        // Upload file
        $path = $request->file('filepo')->storeAs('public/path/to/your/image/', $fileNameToStore);
        // Set file path in the database
        $sales->filepo = $fileNameToStore;
    }

        if ($request->hasFile('filehitunganharga')) {
        // Get file name with extension
        $fileNameWithExt = $request->file('filehitunganharga')->getClientOriginalName();
        // Get just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get just extension
        $extension = $request->file('filehitunganharga')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        // Upload file
        $path = $request->file('filehitunganharga')->storeAs('public/path/to/your/image/', $fileNameToStore);
        // Set file path in the database
        $sales->filehitunganharga = $fileNameToStore;
    }

        if ($request->has('canvasImage')) {
        // Simpan data gambar dari input canvasImage ke file
        $data = $request->canvasImage;
        $fileNameToStore = 'canvas_' . time() . '.png'; // Buat nama file baru
        $path = storage_path('app/public/path/to/your/image/') . $fileNameToStore; // Tentukan lokasi penyimpanan file
        // Simpan data gambar ke file
        file_put_contents($path, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data)));
        // Set file path dalam model Sales
        $sales->fileponoprice = $fileNameToStore;
    }

        $sales->save();

    return redirect()->route('salesnonppndept.index')->with('success', 'Sales record updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }

    public function print($id){
            $sc = Salesnonppn::find($id);
            return view('role.nonppn.sales.salesdept.salescontract.print', compact('sc'));
    }

    public function printpo($po){
            $sc = Salesnonppn::where('po', $po)->first();
            return view('role.nonppn.sales.salesdept.salescontract.printpo', compact('sc'));
    }

}

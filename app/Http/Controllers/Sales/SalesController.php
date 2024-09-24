<?php

namespace App\Http\Controllers\Sales;

use App\Models\Customer;
use App\Models\Plant;
use App\Models\Sales;
use App\Models\Prodev;
use App\Models\Productsales;
use App\Models\Tender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage; // Perhatikan penambahan use statement ini
use Illuminate\Support\Facades\DB;



class SalesController extends Controller
{
    public function index(Request $request) {
    $query = Sales::query();
    $salesexports = Sales::all();
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
              ->orWhere('po', 'like', '%' . $searchValue . '%')
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
        $query->orderByDesc('updated_at');
    } elseif ($sortBy == 'asc') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
        $query->orderBy('id');
    } elseif ($sortBy == 'desc') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
        $query->orderByDesc('id');
    }
    // Ambil data berdasarkan query yang telah dibuat
    $salescontract = $query->paginate(20);
    return view('role.sales.salesdept.salescontract.listsales', compact('plants','salescontract', 'cust','productsales','tenders','salesexports'));
}




    public function show(Sales $sales, $id)
    {
        $details = Sales::find($id);
        return view('role.sales.salesdept.salescontract.show', compact('details'));
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

        $sales = new Sales;
        $sales->idquotation = $request->idquotation;
        $sales->po = $request->po;
        $sales->tanggalpo = $request->tanggalpo;
        $sales->scode = $request->scode;
        $sales->customer = $request->customer;
        $sales->address = $request->address;
        $sales->up = $request->up;
        $sales->plantcode = $request->plantcode;
        $sales->gensc = json_encode($request->gensc);
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
        $sales->lastprice = json_encode($request->lastprice);
        $sales->lastqty = json_encode($request->lastqty);
        $sales->lastorder = json_encode($request->lastorder);
        $sales->lastsc = json_encode($request->lastsc);
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
        
        return redirect()->route('salesdept.index');
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
    public function edit(Sales $sales,$id)
    {
        $plants = Plant::all();
        $tenders = Tender::all();
        $cust = Customer::all();
        $salescontract = Sales::find($id);
        return view('role.sales.salesdept.salescontract.edit', compact('plants','cust','tenders','salescontract'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
        $sales = Sales::find($id);
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
        $sales->gensc = json_encode($request->gensc);
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
        
        $genscs = $request->gensc;
        $products = $request->product;
        $saps = $request->sap;
        $materials = $request->material;
        $finishings = $request->finishing;
        $specs = $request->specs;
        $sizes = $request->size;
        $qtys = $request->qty;
        $units = $request->unit;
        $prices = $request->price;
        $totals = $request->total;
        $etausers = $request->etauser;
        $toleransis = $request->toleransi;
        $notescs = $request->notesc;
        $statusproducts = $request->statusproduct;

        $prodevs = Prodev::where('nosc', $id)->get();
        foreach ($prodevs as $prodev) {
            foreach ($genscs as $index => $gensc) {
                if ($prodev->gensc === $gensc) {
                    $prodev->tanggalpo = $request->tanggalpo;
                    $prodev->po = $request->po;
                    $prodev->scode = $request->scode;
                    $prodev->address = $request->address;
                    $prodev->plantcode = $request->plantcode;
                    $prodev->customer = $request->customer;
                    $prodev->gensc = $gensc;
                    $prodev->product = $products[$index];
                    $prodev->sap = $saps[$index];
                    $prodev->material = $materials[$index];
                    $prodev->finishing = $finishings[$index];
                    $prodev->specs = $specs[$index];
                    $prodev->size = $sizes[$index];
                    $prodev->qty = $qtys[$index];
                    $prodev->unit = $units[$index];
                    $prodev->price = $prices[$index];
                    $prodev->total = $totals[$index];
                    $prodev->etauser = $etausers[$index];
                    $prodev->toleransi = $toleransis[$index];
                    $prodev->notesc = $notescs[$index];
                    $prodev->statusproduct = $statusproducts[$index];
                    $prodev->save();
                    break;
                }
            }
        }

    return redirect()->route('salesdept.index')->with('success', 'Sales record updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }

    public function print($id){
            $sc = Sales::find($id);
            return view('role.sales.salesdept.salescontract.print', compact('sc'));
    }
    
    public function printpo($po){
            $sc = Sales::where('po', $po)->first();
            return view('role.sales.salesdept.salescontract.printpo', compact('sc'));
    }
    
        public function calculatePercentageChange()
    {
        // Ambil tanggal hari ini dan tanggal seminggu yang lalu
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        // Ambil jumlah data dari satu minggu terakhir
        $dataThisWeek = Sales::whereBetween('created_at', [$startDate, $endDate])->count();

        // Ambil jumlah data dari minggu sebelumnya
        $previousStartDate = $startDate->copy()->subWeek();
        $previousEndDate = $endDate->copy()->subWeek();
        $dataLastWeek = Sales::whereBetween('created_at', [$previousStartDate, $previousEndDate])->count();

        // Hitung persentase kenaikan atau penurunan data
        if ($dataLastWeek != 0) {
            $percentageChange = (($dataThisWeek - $dataLastWeek) / $dataLastWeek) * 100;
        } else {
            $percentageChange = 0; // Jika data minggu sebelumnya kosong, maka persentase kenaikan dianggap 0
        }

        // Mengembalikan hasil perhitungan
        return [
            'dataThisWeek' => $dataThisWeek,
            'dataLastWeek' => $dataLastWeek,
            'percentageChange' => number_format($percentageChange, 2)
        ];
    }

    public function calculatePercentageChangePrice()
    {
        // Ambil tanggal hari ini dan tanggal seminggu yang lalu
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        // Ambil data dari satu minggu terakhir
        $dataThisWeek = Sales::whereBetween('created_at', [$startDate, $endDate])->get();

        // Ambil data dari minggu sebelumnya
        $previousStartDate = $startDate->copy()->subWeek();
        $previousEndDate = $endDate->copy()->subWeek();
        $dataLastWeek = Sales::whereBetween('created_at', [$previousStartDate, $previousEndDate])->get();

        // Menghitung jumlah total price untuk satu minggu ini dan minggu sebelumnya
        $totalPriceThisWeek = 0;
        foreach ($dataThisWeek as $item) {
            $prices = json_decode($item->total, true); // Decode string JSON menjadi array PHP
            $totalPriceThisWeek += array_sum($prices); // Menjumlahkan nilai-nilai di dalam array
        }

        $totalPriceLastWeek = 0;
        foreach ($dataLastWeek as $item) {
            $prices = json_decode($item->total, true);
            $totalPriceLastWeek += array_sum($prices);
        }

        // Hitung persentase kenaikan atau penurunan data
        if ($totalPriceLastWeek != 0) {
            $percentageChange = (($totalPriceThisWeek - $totalPriceLastWeek) / $totalPriceLastWeek) * 100;
        } else {
            $percentageChange = 0; // Jika data minggu sebelumnya kosong, maka persentase kenaikan dianggap 0
        }

        // Mengembalikan hasil perhitungan
        return [
            'totalPriceThisWeek' => $totalPriceThisWeek,
            'totalPriceLastWeek' => $totalPriceLastWeek,
            'percentageChange' => number_format($percentageChange, 2)
        ];
    }


    public function dashboard (){
        $dataprice = $this->calculatePercentageChangePrice();
        $data = $this->calculatePercentageChange();

            return view('role.sales.salesdept.dashboard', compact('data','dataprice'));
    }
    
    
public function checkData(Request $request)
{
    $product = strtolower($request->input('product'));
    
    // Lakukan pengecekan data di model Purchasing
    $saless = DB::table('sales')
        ->whereRaw("JSON_CONTAINS(LOWER(`product`), '\"".strtolower($product)."\"')")
        ->orderByDesc('id')
        ->get();

    $results = [];

    foreach ($saless as $sales) {
        // Decode JSON fields
        $productArray = json_decode($sales->product, true);
        $tanggalproductArray = json_decode($sales->tanggalproduct, true);
        $priceArray = json_decode($sales->price, true);
        $qtyArray = json_decode($sales->qty, true);

        // Loop melalui setiap elemen dalam array item
        foreach ($productArray as $index => $productValue) {
            if (strtolower($productValue) === $product) {
                // Ambil data lainnya
                $id = $sales->id;
                $tanggalproduct = isset($tanggalproductArray[$index]) ? $tanggalproductArray[$index] : null;
                $price = isset($priceArray[$index]) ? $priceArray[$index] : null;
                $qty = isset($qtyArray[$index]) ? $qtyArray[$index] : null;

                // Jika tanggalitem dan price ada, tambahkan ke hasil
                if ($tanggalproduct !== null || $price !== null || $qty !== null) {
                    $results[] = ['id' => $id, 'tanggalproduct' => $tanggalproduct, 'price' => $price, 'qty' => $qty];
                }
            }
        }
    }

    if (!empty($results)) {
        // Kembalikan hasilnya dalam format JSON
        return response()->json(['exists' => true, 'data' => $results]);
    }
    // Jika tidak ditemukan atau terjadi kesalahan, kembalikan flag exists false
    return response()->json(['exists' => false]);
}


}

<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use App\Models\Purchasing;
use App\Models\Supplier;
use App\Models\Materialrequest;
use Illuminate\Http\Request;

class PurchasingController extends Controller
{
    
    public function export(){
        $purchasing = Purchasing::all();
        return view('role.purchasing.export', compact('purchasing'));
    }



    public function index(Request $request)
{
    $sort = $request->input('sort', 'created'); // Default sort by created
    $query = Purchasing::query();
    $status = $request->input('status', null);

    if ($status) {
        $query->where('status', $status);
    }

    // Menambahkan pengurutan berdasarkan kondisi
    if ($sort === 'created_at-asc') {
        $query->orderBy('created_at', 'asc');
    } elseif ($sort === 'created_at-desc') {
        $query->orderBy('created_at', 'desc');
    } elseif ($sort === 'item-asc') {
        $query->orderBy('item', 'asc');
    } elseif ($sort === 'item-desc') {
        $query->orderBy('item', 'desc');
    } elseif ($sort === 'id-asc') {
        $query->orderBy('id', 'asc');
    } elseif ($sort === 'id-desc') {
        $query->orderBy('id', 'desc');
    } else {
        // Menambahkan default pengurutan jika tidak ada yang sesuai
        $query->orderBy('created_at', 'desc');
    }

    // Menambahkan pencarian ke dalam query
    if ($request->has('search')) {
        $query->where('id', 'LIKE', '%' . $request->search . '%')
            ->orWhere('item', 'LIKE', '%' . $request->search . '%')
            ->orWhere('supplier', 'LIKE', '%' . $request->search . '%');
    }

    // Menambahkan paginate dan latest
    $perPage = 10;
    $purchasing = $query->latest('created_at')->paginate($perPage);

    return view('role.purchasing.listpo', compact('purchasing', 'sort', 'status'));
}

    public function searchsupplier(Request $request)
    {
        $query = $request->input('query');
        $results = Supplier::where('supplier', 'like', "%$query%")->get();

        return view('role.purchasing.search-results', compact('results'));
    }
    public function searchitemresult(Request $request)
    {
        $query = $request->input('query');
        $resultsitem = Pricelist::where('item', '=', $query)->get();

        return view('role.purchasing.search-resultsitem', compact('resultsitem'));
    }
    
     public function searchitemresultmr(Request $request)
    {
        $query = $request->input('query');
        $resultsitem = Pricelist::where('item', '=', $query)->get();

        return view('role.purchasing.search-resultsitemmr', compact('resultsitem'));
    }



    public function create()
    {
        $item = Pricelist::all();
        $supplier = Supplier::all();
        return view('role.purchasing.formpurchasing', compact('supplier', 'item'));
    }






    public function store(Request $request)
    {

        $user = new Purchasing();
        
        $user->cp = $request->cp;
        $user->alamat = $request->alamat;
        $user->mrtanggal = $request->mrtanggal;
        $user->mrnumber = $request->mrnumber;
        $user->type = $request->type;
        $user->dept = $request->dept;
        $user->supplier = $request->supplier;
        $user->product = $request->product;
        $user->vat = $request->vat;
        $user->ref = $request->ref;
        $user->approvalkadept_at = $request->approvalkadept_at;
        $user->status = $request->status;
        $user->po = json_encode($request->po);
        $user->podate = json_encode($request->podate);
        $user->etauser = json_encode($request->etauser);
        $user->etaauto = json_encode($request->etaauto);
        $user->item = json_encode($request->item);
        $user->size = json_encode($request->size);
        $user->specs = json_encode($request->specs);
        $user->qty = json_encode($request->qty);
        $user->unit = json_encode($request->unit);
        $user->price = json_encode($request->price);
        $user->arvqty = json_encode($request->arvqty);
        $user->arvdate = json_encode($request->arvdate);
        $user->tanggalitem  = json_encode($request->tanggalitem);
        $user->image_path = 'path/to/your/image/';
        $user->save();
        
        $table1 = Materialrequest::find($request->mrnumber);
        if ($table1) {
            $table1->idpo = $user->id;
            $table1->save();
        }
        
         $userId = $user->id;

    // Update barcode using the ID
    $barcode = 'arjaya.site/barcode/' . $userId; // Add the forward slash here
    $user->update(['barcode' => $barcode]);

    // Generate QR Code
     $qrCodeData = $barcode;

    // Save barcode image to the storage disk
    $barcodeImagePath = storage_path('app/public/path/to/your/image/' . $barcode . '.png');
    $this->generateQRCode($qrCodeData, $barcodeImagePath);

        return redirect()->route('purchaseorder.index')->with('success', 'Product Added Successfully');
    }
    
    
    private function generateQRCode($data, $filename)
    {
        $qrCode = imagecreatefromstring(file_get_contents("https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=$data"));
        imagepng($qrCode, $filename);
        imagedestroy($qrCode);
    }



    public function showdetail($id)
    {
        $materialrequest = Purchasing::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.detailpo', ['materialrequest' => $materialrequest]);
    }

    public function show($id)
    {
        $materialrequest = Purchasing::find($id); // Gantilah DataModel dengan model Anda yang sesuai
          $barcode = $materialrequest->barcode;
        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.formpo',compact('materialrequest','barcode'));
    }
    
      public function showbarcode($id)
    {
        $materialrequest = Purchasing::find($id); // Gantilah DataModel dengan model Anda yang sesuai
          $barcode = $materialrequest->barcode;
        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.formpobarcode',compact('materialrequest','barcode'));
    }
    
    


    /**
     * Show the form for editing the specified resource.
     */
         public function edit($id)
    {
         $materialrequest = Materialrequest::find($id);
        $user = Purchasing::find($id);
        $item = Pricelist::all();
        $supplier = Supplier::all();
        return view('role.purchasing.detailmrpoedit', compact('supplier', 'item', 'user', 'materialrequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Purchasing::find($id);
       
        $user->cp = $request->cp;
        $user->alamat = $request->alamat;
        $user->mrtanggal = $request->mrtanggal;
        $user->mrnumber = $request->mrnumber;
        $user->supplier = $request->supplier;
        $user->product = $request->product;
        $user->vat = $request->vat;
        $user->ref = $request->ref;
        $user->po = json_encode($request->po);
        $user->podate = json_encode($request->podate);
        $user->etauser = json_encode($request->etauser);
        $user->etaauto = json_encode($request->etaauto);
        $user->item = json_encode($request->item);
        $user->size = json_encode($request->size);
        $user->specs = json_encode($request->specs);
        $user->qty = json_encode($request->qty);
        $user->unit = json_encode($request->unit);
        $user->price = json_encode($request->price);
        $user->arvqty = json_encode($request->arvqty);
        $user->arvdate = json_encode($request->arvdate);

        $user->save();

        return redirect()->route('purchaseorder.index')->with('success', 'Product Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Purchasing::findOrFail($id);
        $user->delete();
        return redirect()->route('purchaseorder.index')->with('success', 'Record deleted successfully');
    }
    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');

        // Validasi data jika diperlukan

        // Temukan Materialrequest berdasarkan ID
        $purchasing = Purchasing::find($id);

        if (!$purchasing) {
            // Tambahkan log atau tindakan lain jika Materialrequest tidak ditemukan
            return redirect()->back()->with('error', 'Materialrequest tidak ditemukan.');
        }

        // Perbarui status
        $purchasing->status = $newStatus;
        $purchasing->save();

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
}

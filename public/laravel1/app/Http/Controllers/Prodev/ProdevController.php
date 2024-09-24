<?php

namespace App\Http\Controllers\Prodev;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\Prodev;
use App\Models\Sales;
use Illuminate\Http\Request;

class ProdevController extends Controller
{
    public function dashboard(){
        return view('role.prodev.prodevdept.dashboard');
    }

    public function index1(){
        $sc = Sales::all();
        $job = Prodev::all();
        return view('role.prodev.prodevdept.job.listprodev',compact('job','sc'));
    }

    public function index(Request $request) {
    $query = Sales::query();

    // Pencarian berdasarkan ID atau produk
    if ($request->has('search')) {
        $searchValue = $request->input('search');

        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('product', 'like', '%' . $searchValue . '%');
        });
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
    $sc = $query->paginate(20);

    return view('role.prodev.prodevdept.job.listprodev', compact('sc'));
}
    public function jobindex(Request $request) {
    $query = Prodev::query();

    // Pencarian berdasarkan ID atau produk
    if ($request->has('search')) {
        $searchValue = $request->input('search');

        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('product', 'like', '%' . $searchValue . '%');
        });
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
    $job = $query->paginate(20);

    return view('role.prodev.prodevdept.job.listjob', compact('job'));
}



   public function createshowsc($id, $index) {
    $sc = Sales::find($id);
       $boxes = Box::all();

    if (!$sc) {
        abort(404); // Handle case where the sales record is not found
    }

    $selectedItem = [
        'product' => null,
        'finishing' => null,
        'material' => null,
        'size' => null,
        'specs' => null,
        'qty' => null,
        'sap' => null,
        'unit' => null,
        'etauser' => null,
        'price' => null,
        'total' => null,
        'toleransi' => null,
        'notesc' => null,
        'statusproduct' => null,
    ];

    // Decode JSON data if it exists
    $jsonProduct = json_decode($sc->product, true);
    if ($jsonProduct && is_array($jsonProduct) && isset($jsonProduct[$index])) {
        $selectedItem['product'] = $jsonProduct[$index];
    }

    // Repeat the process for other keys
    $selectedItem['finishing'] = $this->decodeJsonKey($sc->finishing, $index);
    $selectedItem['material'] = $this->decodeJsonKey($sc->material, $index);
    $selectedItem['size'] = $this->decodeJsonKey($sc->size, $index);
    $selectedItem['specs'] = $this->decodeJsonKey($sc->specs, $index);
    $selectedItem['qty'] = $this->decodeJsonKey($sc->qty, $index);
    $selectedItem['sap'] = $this->decodeJsonKey($sc->sap, $index);
    $selectedItem['unit'] = $this->decodeJsonKey($sc->unit, $index);
    $selectedItem['etauser'] = $this->decodeJsonKey($sc->etauser, $index);
    $selectedItem['price'] = $this->decodeJsonKey($sc->price, $index);
    $selectedItem['total'] = $this->decodeJsonKey($sc->total, $index);
    $selectedItem['toleransi'] = $this->decodeJsonKey($sc->toleransi, $index);
    $selectedItem['notesc'] = $this->decodeJsonKey($sc->notesc, $index);
    $selectedItem['statusproduct'] = $this->decodeJsonKey($sc->statusproduct, $index);

    return view('role.prodev.prodevdept.job.createjob', compact('boxes','sc', 'selectedItem'));
}

// Helper method to decode JSON key
private function decodeJsonKey($jsonKey, $index) {
    $decodedKey = json_decode($jsonKey, true);
    return $decodedKey && is_array($decodedKey) && isset($decodedKey[$index]) ? $decodedKey[$index] : null;
}

public function update(Request $request, $id){
    // Find the existing record in the database
    $job = Prodev::find($id);

    // Check if the record exists
    if (!$job) {
        return redirect()->route('job.index')->with('error', 'Record not found');
    }

    // Update the data based on the provided input, if available
    $job->job = $request->filled('job') ? $request->job : $job->job;
    $job->statusjob = $request->filled('statusjob') ? $request->statusjob : $job->statusjob;
    $job->tanggaljob = $request->filled('tanggaljob') ? $request->tanggaljob : $job->tanggaljob;
    $job->original = $request->filled('original') ? $request->original : $job->original;
    $job->design = $request->filled('design') ? $request->design : $job->design;
    $job->tanggalterima = $request->filled('tanggalterima') ? $request->tanggalterima : $job->tanggalterima;
    $job->designno = $request->filled('designno') ? $request->designno : $job->designno;
    $job->statusdesign = $request->filled('statusdesign') ? $request->statusdesign : $job->statusdesign;
    $job->actcolor = $request->filled('actcolor') ? $request->actcolor : $job->actcolor;
    $job->f1 = $request->filled('f1') ? $request->f1 : $job->f1;
    $job->f2 = $request->filled('f2') ? $request->f2 : $job->f2;
    $job->f3 = $request->filled('f3') ? $request->f3 : $job->f3;
    $job->f4 = $request->filled('f4') ? $request->f4 : $job->f4;
    $job->f5 = $request->filled('f5') ? $request->f5 : $job->f5;
    $job->f6 = $request->filled('f6') ? $request->f6 : $job->f6;
    $job->b1 = $request->filled('b1') ? $request->b1 : $job->b1;
    $job->b2 = $request->filled('b2') ? $request->b2 : $job->b2;
    $job->b3 = $request->filled('b3') ? $request->b3 : $job->b3;
    $job->b4 = $request->filled('b4') ? $request->b4 : $job->b4;
    $job->b5 = $request->filled('b5') ? $request->b5 : $job->b5;
    $job->b6 = $request->filled('b6') ? $request->b6 : $job->b6;
    $job->finishingjob = $request->filled('finishingjob') ? $request->finishingjob : $job->finishingjob;
    $job->acuanwarna = $request->filled('acuanwarna') ? $request->acuanwarna : $job->acuanwarna;
    $job->packing = $request->filled('packing') ? $request->packing : $job->packing;
    $job->nops = $request->filled('nops') ? $request->nops : $job->nops;
    $job->boxname = $request->filled('boxname') ? $request->boxname : $job->boxname;
    $job->boxspecs = $request->filled('boxspecs') ? $request->boxspecs : $job->boxspecs;
    $job->boxsize = $request->filled('boxsize') ? $request->boxsize : $job->boxsize;
    $job->nwbox = $request->filled('nwbox') ? $request->nwbox : $job->nwbox;
    $job->aplikasi = $request->filled('aplikasi') ? $request->aplikasi : $job->aplikasi;
    $job->layout = $request->filled('layout') ? $request->layout : $job->layout;
    $job->ukpresslayout = $request->filled('ukpresslayout') ? $request->ukpresslayout : $job->ukpresslayout;
    $job->mat1 = $request->filled('mat1') ? $request->mat1 : $job->mat1;
    $job->mat2 = $request->filled('mat2') ? $request->mat2 : $job->mat2;
    $job->mat3 = $request->filled('mat3') ? $request->mat3 : $job->mat3;
    $job->as1 = $request->filled('as1') ? $request->as1 : $job->as1;
    $job->as2 = $request->filled('as2') ? $request->as2 : $job->as2;
    $job->as3 = $request->filled('as3') ? $request->as3 : $job->as3;
    $job->pisau = $request->filled('pisau') ? $request->pisau : $job->pisau;
    $job->citto = $request->filled('citto') ? $request->citto : $job->citto;
    $job->emboss = $request->filled('emboss') ? $request->emboss : $job->emboss;
    $job->hotprint = $request->filled('hotprint') ? $request->hotprint : $job->hotprint;
    $job->note1 = $request->filled('note1') ? $request->note1 : $job->note1;
    $job->note2 = $request->filled('note2') ? $request->note2 : $job->note2;
    $job->note3 = $request->filled('note3') ? $request->note3 : $job->note3;
    $job->up = $request->filled('up') ? $request->up : $job->up;

    // Sales data
    $job->nosc = $request->filled('nosc') ? $request->nosc : $job->nosc;
    $job->po = $request->filled('po') ? $request->po : $job->po;
    $job->tanggalpo = $request->filled('tanggalpo') ? $request->tanggalpo : $job->tanggalpo;
    $job->scode = $request->filled('scode') ? $request->scode : $job->scode;
    $job->address = $request->filled('address') ? $request->address : $job->address;
    $job->customer = $request->filled('customer') ? $request->customer : $job->customer;
    $job->plantcode = $request->filled('plantcode') ? $request->plantcode : $job->plantcode;
    $job->client = $request->filled('client') ? $request->client : $job->client;
    $job->product = $request->filled('product') ? $request->product : $job->product;
    $job->sap = $request->filled('sap') ? $request->sap : $job->sap;
    $job->material = $request->filled('material') ? $request->material : $job->material;
    $job->specs = $request->filled('specs') ? $request->specs : $job->specs;
    $job->size = $request->filled('size') ? $request->size : $job->size;
    $job->finishing = $request->filled('finishing') ? $request->finishing : $job->finishing;
    $job->qty = $request->filled('qty') ? $request->qty : $job->qty;
    $job->unit = $request->filled('unit') ? $request->unit : $job->unit;
    $job->etauser = $request->filled('etauser') ? $request->etauser : $job->etauser;
    $job->toleransi = $request->filled('toleransi') ? $request->toleransi : $job->toleransi;
    $job->notesc = $request->filled('notesc') ? $request->notesc : $job->notesc;

    // Save the updated model to the database
    $job->save();

    // Optionally, you can return a response or redirect the user to another page
    return redirect()->route('job.jobindex')->with('success', 'Record updated successfully');
}




    public function show($id){
        $details = Prodev::find($id);
        return view('role.prodev.prodevdept.job.show', compact('details'));
}
    public function getdatabox($boxname)
{
    $boxes = Box::where('boxname', $boxname)->first();

    if ($boxes) {
        return response()->json(['size' => $boxes->size, 'specs' => $boxes->specs]);
    } else {
        return response()->json(['error' => 'Data customer tidak ditemukan.'], 404);
    }
}

    public function edit($id){

        $job = Prodev::find($id);
        $boxes = Box::all();
        return view('role.prodev.prodevdept.job.edit',compact('boxes','job'));
    }

    public function print($id){
        $job = Prodev::find($id);
        return view('role.prodev.prodevdept.job.print', compact('job'));
    }

}

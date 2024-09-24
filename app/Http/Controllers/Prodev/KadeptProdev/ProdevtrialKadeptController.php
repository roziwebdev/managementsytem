<?php

namespace App\Http\Controllers\Prodev\KadeptProdev;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\Designnumber;
use App\Models\Docketnew;
use App\Models\Prodevtrial;
use App\Models\Sales;
use App\Models\Plant;
use App\Models\Customer;

use Illuminate\Http\Request;

class ProdevtrialKadeptController extends Controller
{

    public function index(Request $request){
    $docketnew = Docketnew::all();
    $designno = Designnumber::all();
    $plants = Plant::all();
    $cust = Customer::all();
    $query = Prodevtrial::query();
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
        $query->orderByDesc('updated_at');
    } elseif ($sortBy == 'asc') {
        $query->orderBy('id');
    } elseif ($sortBy == 'desc') {
        $query->orderByDesc('id');
    }elseif ($sortBy == 'asccreated') {
        $query->orderBy('created_at');
    } elseif ($sortBy == 'desccreated') {
        $query->orderByDesc('created_at');
    }elseif ($sortBy == 'ascupdated') {
        $query->orderBy('updated_at');
    } elseif ($sortBy == 'descupdated') {
        $query->orderByDesc('updated_at');
    }

    // Ambil data berdasarkan query yang telah dibuat
    $job = $query->paginate(10);
        return view('role.prodev.prodevkadept.jobtrial.listjobtrial',compact('job','docketnew','designno','cust','plants'));
    }

    public function show(Request $request, $id){

        $docketnew = Docketnew::find($id);
        $docketold = Designnumber::find($id);
        return view('role.prodev.prodevkadept.jobtrial.show',compact('docketnew','docketold'));
    }

    public function createshowsctrial($id, $index) {
    $designno = Designnumber::orderByDesc('id')->get();
    $docketnew = Docketnew::orderByDesc('id')->get();
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
        'jobsc' => null,
    ];

    // Decode JSON data if it exists
    $jsonProduct = json_decode($sc->product, true);
    if ($jsonProduct && is_array($jsonProduct) && isset($jsonProduct[$index])) {
        $selectedItem['product'] = $jsonProduct[$index];
    }

    // Repeat the process for other keys
    $selectedItem['plantcode'] = $this->decodeJsonKey($sc->plantcode, $index);
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
    $selectedItem['jobsc'] = $this->decodeJsonKey($sc->jobsc, $index);

    return view('role.prodev.prodevkadept.jobtrial.createjobtrial', compact('boxes','sc', 'selectedItem','designno','index','docketnew'));
}

// Helper method to decode JSON key
private function decodeJsonKey($jsonKey, $index) {
    $decodedKey = json_decode($jsonKey, true);
    return $decodedKey && is_array($decodedKey) && isset($decodedKey[$index]) ? $decodedKey[$index] : null;
}



public function updateShowsctrial(Request $request, $id, $index) {

    $job = new Prodevtrial;
    // Isi atribut dengan data dari permintaan
    $job->status = $request->status;
    $job->created = $request->created;
    $job->statusjob = $request->statusjob;
    $job->tanggaljob = $request->tanggaljob;
    $job->original = $request->original;
    $job->design = $request->design;
    $job->tanggalterima = $request->tanggalterima;
    $job->designno = $request->designno;
    $job->filelayout = $request->filelayout;
    $job->namalayout = $request->namalayout;
    $job->statusdesign = $request->statusdesign;
    $job->actcolor = $request->actcolor;
    $job->f1 = $request->f1;
    $job->f2 = $request->f2;
    $job->f3 = $request->f3;
    $job->f4 = $request->f4;
    $job->f5 = $request->f5;
    $job->f6 = $request->f6;
    $job->b1 = $request->b1;
    $job->b2 = $request->b2;
    $job->b3 = $request->b3;
    $job->b4 = $request->b4;
    $job->b5 = $request->b5;
    $job->b6 = $request->b6;
    $job->finishingjob = $request->finishingjob;
    $job->acuanwarna = $request->acuanwarna;
    $job->packing = $request->packing;
    $job->nops = $request->nops;
    $job->boxname = $request->boxname;
    $job->boxspecs = $request->boxspecs;
    $job->boxsize = $request->boxsize;
    $job->nwbox = $request->nwbox;
    $job->aplikasi = $request->aplikasi;
    $job->layout = $request->layout;
    $job->ukpresslayout = $request->ukpresslayout;
    $job->mat1 = $request->mat1;
    $job->mat2 = $request->mat2;
    $job->mat3 = $request->mat3;
    $job->as1 = $request->as1;
    $job->as2 = $request->as2;
    $job->as3 = $request->as3;
    $job->pisau = $request->pisau;
    $job->citto = $request->citto;
    $job->emboss = $request->emboss;
    $job->hotprint = $request->hotprint;
    $job->note1 = $request->note1;
    $job->note2 = $request->note2;
    $job->note3 = $request->note3;
    $job->up = $request->up;
    $job->nosc = $request->nosc;
    $job->po = $request->po;
    $job->fileponoprice = $request->fileponoprice;
    $job->tanggalpo = $request->tanggalpo;
    $job->scode = $request->scode;
    $job->address = $request->address;
    $job->customer = $request->customer;
    $job->plantcode = $request->plantcode;
    $job->client = $request->client;
    $job->product = $request->product;
    $job->sap = $request->sap;
    $job->material = $request->material;
    $job->specs = $request->specs;
    $job->size = $request->size;
    $job->finishing = $request->finishing;
    $job->qty = $request->qty;
    $job->unit = $request->unit;
    $job->price = $request->price;
    $job->createdsc = $request->createdsc;
    $job->updatedsc = $request->updatedsc;
    $job->etauser = $request->etauser;
    $job->toleransi = $request->toleransi;
    $job->notesc = $request->notesc;
    // Simpan data ke database
    $job->save();


   return redirect()->route('kadeptjobtrial.index');
}


private function updateJsonKey($jsonData, $newValue, $index) {
    $decodedData = json_decode($jsonData, true);
    if ($decodedData && is_array($decodedData)) {
        $decodedData[$index] = $newValue;
        return json_encode($decodedData);
    }
    return $jsonData;
}




 public function updateStatusJobtrial(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');

        // Validasi data jika diperlukan

        // Temukan Materialrequest berdasarkan ID
        $job = Prodevtrial::find($id);

        // Perbarui status
        $job->statusjob = $newStatus;
        $job->save();

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
     public function reqEditJobtrial(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $noteedit = $request->input('noteedit');

        // Validasi data jika diperlukan

        // Temukan Materialrequest berdasarkan ID
        $job = Prodevtrial::find($id);

        // Perbarui status
        $job->statusjob = $newStatus;
        $job->noteedit = $noteedit;
        $job->save();

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
    public function edit($id){

        $job = Prodevtrial::find($id);
        $boxes = Box::all();
        return view('role.prodev.prodevkadept.jobtrial.edit',compact('boxes','job'));
    }

    public function print($id){
        $job = Prodevtrial::find($id);
        return view('role.prodev.prodevkadept.jobtrial.print', compact('job'));
    }


public function update(Request $request, $id){
    // Find the existing record in the database
    $job = Prodevtrial::find($id);

    // Check if the record exists
    if (!$job) {
        return redirect()->route('kadeptjob.index')->with('error', 'Record not found');
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
    return redirect()->route('kadeptjobtrial.index');
}

public function store(Request $request){
    
    $job = new Prodevtrial;
    // Isi atribut dengan data dari permintaan
    $job->status = $request->status;
    $job->created = $request->created;
    $job->statusjob = $request->statusjob;
    $job->tanggaljob = $request->tanggaljob;
    $job->original = $request->original;
    $job->design = $request->design;
    $job->tanggalterima = $request->tanggalterima;
    $job->designno = $request->designno;
    $job->filelayout = $request->filelayout;
    $job->namalayout = $request->namalayout;
    $job->statusdesign = $request->statusdesign;
    $job->actcolor = $request->actcolor;
    $job->f1 = $request->f1;
    $job->f2 = $request->f2;
    $job->f3 = $request->f3;
    $job->f4 = $request->f4;
    $job->f5 = $request->f5;
    $job->f6 = $request->f6;
    $job->b1 = $request->b1;
    $job->b2 = $request->b2;
    $job->b3 = $request->b3;
    $job->b4 = $request->b4;
    $job->b5 = $request->b5;
    $job->b6 = $request->b6;
    $job->finishingjob = $request->finishingjob;
    $job->acuanwarna = $request->acuanwarna;
    $job->packing = $request->packing;
    $job->nops = $request->nops;
    $job->boxname = $request->boxname;
    $job->boxspecs = $request->boxspecs;
    $job->boxsize = $request->boxsize;
    $job->nwbox = $request->nwbox;
    $job->aplikasi = $request->aplikasi;
    $job->layout = $request->layout;
    $job->ukpresslayout = $request->ukpresslayout;
    $job->mat1 = $request->mat1;
    $job->mat2 = $request->mat2;
    $job->mat3 = $request->mat3;
    $job->as1 = $request->as1;
    $job->as2 = $request->as2;
    $job->as3 = $request->as3;
    $job->pisau = $request->pisau;
    $job->citto = $request->citto;
    $job->emboss = $request->emboss;
    $job->hotprint = $request->hotprint;
    $job->note1 = $request->note1;
    $job->note2 = $request->note2;
    $job->note3 = $request->note3;
    $job->up = $request->up;
    $job->nosc = $request->nosc;
    $job->po = $request->po;
    $job->fileponoprice = $request->fileponoprice;
    $job->tanggalpo = $request->tanggalpo;
    $job->scode = $request->scode;
    $job->address = $request->address;
    $job->customer = $request->customer;
    $job->plantcode = $request->plantcode;
    $job->client = $request->client;
    $job->product = $request->product;
    $job->sap = $request->sap;
    $job->material = $request->material;
    $job->specs = $request->specs;
    $job->size = $request->size;
    $job->finishing = $request->finishing;
    $job->qty = $request->qty;
    $job->unit = $request->unit;
    $job->price = $request->price;
    $job->createdsc = $request->createdsc;
    $job->updatedsc = $request->updatedsc;
    $job->etauser = $request->etauser;
    $job->toleransi = $request->toleransi;
    $job->notesc = $request->notesc;
    // Simpan data ke database
    $job->save();


   return redirect()->route('kadeptjobtrial.index');
    
}


}

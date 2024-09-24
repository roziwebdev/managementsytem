<?php

namespace App\Http\Controllers\Prodev\KadeptProdev;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\Designnumber;
use App\Models\Docketnew;
use App\Models\Prodev;
use App\Models\Sales;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;


class ProdevKadeptController extends Controller
{
       public function dashboard(){
        return view('role.prodev.prodevkadept.dashboard');
    }

    public function index1(){
        $sc = Sales::all();
        $job = Prodev::all();
        return view('role.prodev.prodevkadept.job.listprodev',compact('job','sc'));
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
        $query->orderByDesc('id');
    } elseif ($sortBy == 'asc') {
        $query->orderBy('id');
    } elseif ($sortBy == 'desc') {
        $query->orderByDesc('id');
    }elseif ($sortBy == 'asc') {
        $query->orderBy('created_at');
    } elseif ($sortBy == 'desc') {
        $query->orderByDesc('created_at');
    }elseif ($sortBy == 'asc') {
        $query->orderBy('updated_at');
    } elseif ($sortBy == 'desc') {
        $query->orderByDesc('updated_at');
    }

    // Menambahkan kondisi untuk menampilkan data yang jobsc-nya null
    $query->whereJsonContains('jobsc', null);
    $query->where('statussc', 'Approve');

    // Ambil data berdasarkan query yang telah dibuat
    $sc = $query->paginate(10);

    return view('role.prodev.prodevkadept.job.listprodev', compact('sc'));
}
public function indexscjob(Request $request) {

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
        $query->orderByDesc('updated_at');
    } elseif ($sortBy == 'asc') {
        $query->orderBy('id');
    } elseif ($sortBy == 'desc') {
        $query->orderByDesc('id');
    }elseif ($sortBy == 'asc') {
        $query->orderBy('created_at');
    } elseif ($sortBy == 'desc') {
        $query->orderByDesc('created_at');
    }elseif ($sortBy == 'asc') {
        $query->orderBy('updated_at');
    } elseif ($sortBy == 'desc') {
        $query->orderByDesc('updated_at');
    }

    // Menambahkan kondisi untuk menampilkan data yang jobsc-nya null
    $query->whereJsonContains('jobsc', 'create job');
    $query->where('statussc', 'Approve');

    // Ambil data berdasarkan query yang telah dibuat
    $sc = $query->paginate(10);

    return view('role.prodev.prodevkadept.job.listprodevsc', compact('sc'));
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
    
    $statusjob = $request->input('statusjob', null);
        if ($statusjob) {
            $query->where('statusjob', $statusjob);
    }

    // Filter produk berdasarkan ascending (asc) atau descending (desc)
    $sortBy = $request->input('sort_by', null);
    

    if (!$sortBy) {
        $query->orderByDesc('id');
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

    return view('role.prodev.prodevkadept.job.listjob', compact('job'));
}



   public function createshowsc($id, $index) {
    $designno = Designnumber::orderByDesc('id')->get();
    $docketnew = Docketnew::orderByDesc('id')->get();
    $sc = Sales::find($id);
    $boxes = Box::all();

    if (!$sc) {
        abort(404); // Handle case where the sales record is not found
    }

    $selectedItem = [
        'product' => null,
        'gensc' => null,
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
    $selectedItem['gensc'] = $this->decodeJsonKey($sc->gensc, $index);
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

    return view('role.prodev.prodevkadept.job.createjob', compact('boxes','sc', 'selectedItem','designno','index','docketnew'));
}

// Helper method to decode JSON key
private function decodeJsonKey($jsonKey, $index) {
    $decodedKey = json_decode($jsonKey, true);
    return $decodedKey && is_array($decodedKey) && isset($decodedKey[$index]) ? $decodedKey[$index] : null;
}

//updatesales
public function updateShowsc(Request $request, $id, $index) {

    $job = new Prodev;
    // Isi atribut dengan data dari permintaan
    $job->gensc = $request->gensc;
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


    $request->validate([
        'product' => 'required',
        'jobsc' => 'required',
    ]);

    $sc = Sales::find($id);

    if (!$sc) {
        abort(404); // Handle case where the sales record is not found
    }

    // Update the selected item with the incoming request data
    $jsonProduct = json_decode($sc->product, true);
    if ($jsonProduct && is_array($jsonProduct)) {
        $jsonProduct[$index] = $request->input('product');
        $sc->product = json_encode($jsonProduct);
    }

    // Repeat the process for other keys

    $sc->jobsc = $this->updateJsonKey($sc->jobsc, $request->input('jobsc'), $index);

    // Save the updated sales record
    $sc->save();

   return redirect()->route('kadeptjob.index');
}

// Helper function to update JSON key
private function updateJsonKey($jsonData, $newValue, $index) {
    $decodedData = json_decode($jsonData, true);
    if ($decodedData && is_array($decodedData)) {
        $decodedData[$index] = $newValue;
        return json_encode($decodedData);
    }
    return $jsonData;
}




public function update(Request $request, $id){
    // Find the existing record in the database
    $job = Prodev::find($id);

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
    return redirect()->route('kadeptjob.index');
}

public function store(Request $request)
{
    // Buat objek Prodev
    $job = new Prodev;
    // Isi atribut dengan data dari permintaan
    $job->gensc = $request->gensc;
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
    
    $job->nops = $request->nops;
    $job->nwpcs = $request->nwpcs;
    $job->estimasipackaging = $request->estimasipackaging;
    $job->nwbox = $request->nwbox;
    $job->packing = $request->packing;
    $job->boxname = $request->boxname;
    $job->boxspecs = $request->boxspecs;
    $job->boxsize = $request->boxsize;
    $job->boxdalampanjang = $request->boxdalampanjang;
    $job->boxdalamlebar = $request->boxdalamlebar;
    $job->boxdalamtinggi = $request->boxdalamtinggi;
    $job->boxluarpanjang = $request->boxluarpanjang;
    $job->boxluarlebar = $request->boxluarlebar;
    $job->boxluartinggi = $request->boxluartinggi;
    $job->effective = $request->effective;
    $job->preparedate = $request->preparedate;
    $job->suplier = $request->suplier;
    $job->isi = $request->isi;
    $job->isiboxsap = $request->isiboxsap;
    $job->sapataubendel = $request->sapataubendel;
    $job->susunan = $request->susunan;
    $job->gambar1 = $request->gambar1;
    $job->gambar2 = $request->gambar2;
    $job->gambar3 = $request->gambar3;
    $job->gambar4 = $request->gambar4;
    $job->gambar5 = $request->gambar5;
    $job->notepackaging = $request->notepackaging;

    
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
    $job->etauser = $request->etauser;
    $job->toleransi = $request->toleransi;
    $job->notesc = $request->notesc;
    // Simpan data ke database
    $job->save();



    // Redirect ke halaman index
    return redirect()->route('kadeptjob.index');
}



    public function show($id){
        $details = Prodev::find($id);
        return view('role.prodev.prodevkadept.job.show', compact('details'));
}
    public function getdatabox($boxname){
        $boxes = Box::where('boxname', $boxname)->first();

        if ($boxes) {
            return response()->json(['size' => $boxes->size, 'specs' => $boxes->specs]);
        } else {
            return response()->json(['error' => 'Data customer tidak ditemukan.'], 404);
        }
    }
    public function getdatadesign($designno){
    $design = Designnumber::where('designno', $designno)->first();
    $docketnew = Docketnew::where('id', $id)->first();
    if ($design) {
        return response()->json([
            'product' => $design->product,
            'sap' => $design->sap,
            'tanggalterima' => $design->tanggalterima,
            'original' => $design->original,
            'design' => $design->design,
            'statusorder' => $design->statusorder,
            'actcolor' => $design->actcolor,
            'finishingjob' => $design->finishingjob,
            'acuanwarna' => $design->acuanwarna,
            
            'nops' => $design->nops,
            'nwpcs' => $design->nwpcs,
            'estimasipackaging' => $design->estimasipackaging,
            'packing' => $design->packing,
            'nwbox' => $design->nwbox,
            'boxname' => $design->boxname,
            'boxspecs' => $design->boxspecs,
            'boxsize' => $design->boxsize,
            'boxdalampanjang' => $design->boxdalampanjang,
            'boxdalamlebar' => $design->boxdalamlebar,
            'boxdalamtinggi' => $design->boxdalamtinggi,
            'boxluarpanjang' => $design->boxluarpanjang,
            'boxluarlebar' => $design->boxluarlebar,
            'boxluartinggi' => $design->boxluartinggi,
            'effective' => $design->effective,
            'preparedate' => $design->preparedate,
            'suplier' => $design->suplier,
            'isi' => $design->isi,
            'isiboxsap' => $design->isiboxsap,
            'sapataubendel' => $design->sapataubendel,
            'susunan' => $design->susunan,
            'gambar1' => $design->gambar1,
            'gambar2' => $design->gambar2,
            'gambar3' => $design->gambar3,
            'gambar4' => $design->gambar4,
            'gambar5' => $design->gambar5,
            'notepackaging' => $design->notepackaging,

            'aplikasi' => $design->aplikasi,
            'layout' => $design->layout,
            'up' => $design->up,
            'ukpresslayout' => $design->ukpresslayout,
            'pisau' => $design->pisau,
            'citto' => $design->citto,
            'emboss' => $design->emboss,
            'hotprint' => $design->hotprint,
            'mat1' => $design->mat1,
            'as1' => $design->as1,
            'mat2' => $design->mat2,
            'as2' => $design->as2,
            'mat3' => $design->mat3,
            'as3' => $design->as3,
            'f1' => $design->f1,
            'f2' => $design->f2,
            'f3' => $design->f3,
            'f4' => $design->f4,
            'f5' => $design->f5,
            'f6' => $design->f6,
            'b1' => $design->b1,
            'b2' => $design->b2,
            'b3' => $design->b3,
            'b4' => $design->b4,
            'b5' => $design->b5,
            'b6' => $design->b6,
            'note1' => $design->note1,
            'note2' => $design->note2,
            'note3' => $design->note3,
            'a' => $docketnew->a,
            'b' => $docketnew->b,
            'c' => $docketnew->c,
            'd' => $docketnew->d,
            'e' => $docketnew->e,
            'f' => $docketnew->f,
            'g' => $docketnew->g,
            'h' => $docketnew->h,
            'i' => $docketnew->i,
            'j' => $docketnew->j,
            'filea' => $docketnew->filea,
            'fileb' => $docketnew->fileb,
            'filec' => $docketnew->filec,
            'filed' => $docketnew->filed,
            'filee' => $docketnew->filee,
            'filef' => $docketnew->filef,
            'fileg' => $docketnew->fileg,
            'fileh' => $docketnew->fileh,
            'filei' => $docketnew->filei,
            'filej' => $docketnew->filej,
        ]);
    }
     else if ($docketnew) {
        return response()->json([
            'product' => $docketnew->product,
            'sap' => $docketnew->sap,
            'tanggalterima' => $docketnew->tanggalterima,
            'original' => $docketnew->original,
            'design' => $docketnew->design,
            'statusorder' => $docketnew->statusorder,
            'actcolor' => $docketnew->actcolor,
            'finishingjob' => $docketnew->finishingjob,
            'acuanwarna' => $docketnew->acuanwarna,
            
            
            'nops' => $docketnew->nops,
            'nwpcs' => $docketnew->nwpcs,
            'estimasipackaging' => $docketnew->estimasipackaging,
            'packing' => $docketnew->packing,
            'nwbox' => $docketnew->nwbox,
            'boxname' => $docketnew->boxname,
            'boxspecs' => $docketnew->boxspecs,
            'boxsize' => $docketnew->boxsize,
            'boxdalampanjang' => $docketnew->boxdalampanjang,
            'boxdalamlebar' => $docketnew->boxdalamlebar,
            'boxdalamtinggi' => $docketnew->boxdalamtinggi,
            'boxluarpanjang' => $docketnew->boxluarpanjang,
            'boxluarlebar' => $docketnew->boxluarlebar,
            'boxluartinggi' => $design->boxluartinggi,
            'effective' => $docketnew->effective,
            'preparedate' => $docketnew->preparedate,
            'suplier' => $docketnew->suplier,
            'isi' => $docketnew->isi,
            'isiboxsap' => $docketnew->isiboxsap,
            'sapataubendel' => $docketnew->sapataubendel,
            'susunan' => $docketnew->susunan,
            'gambar1' => $docketnew->gambar1,
            'gambar2' => $docketnew->gambar2,
            'gambar3' => $docketnew->gambar3,
            'gambar4' => $docketnew->gambar4,
            'gambar5' => $docketnew->gambar5,
            'notepackaging' => $docketnew->notepackaging,
            
            
            'aplikasi' => $docketnew->aplikasi,
            'layout' => $docketnew->layout,
            'up' => $docketnew->up,
            'ukpresslayout' => $docketnew->ukpresslayout,
            'pisau' => $docketnew->pisau,
            'citto' => $docketnew->citto,
            'emboss' => $docketnew->emboss,
            'hotprint' => $docketnew->hotprint,
            'mat1' => $docketnew->mat1,
            'as1' => $docketnew->as1,
            'mat2' => $docketnew->mat2,
            'as2' => $docketnew->as2,
            'mat3' => $docketnew->mat3,
            'as3' => $docketnew->as3,
            'f1' => $docketnew->f1,
            'f2' => $docketnew->f2,
            'f3' => $docketnew->f3,
            'f4' => $docketnew->f4,
            'f5' => $docketnew->f5,
            'f6' => $docketnew->f6,
            'b1' => $docketnew->b1,
            'b2' => $docketnew->b2,
            'b3' => $docketnew->b3,
            'b4' => $docketnew->b4,
            'b5' => $docketnew->b5,
            'b6' => $docketnew->b6,
            'note1' => $docketnew->note1,
            'note2' => $docketnew->note2,
            'note3' => $docketnew->note3,
            'a' => $docketnew->a,
            'b' => $docketnew->b,
            'c' => $docketnew->c,
            'd' => $docketnew->d,
            'e' => $docketnew->e,
            'f' => $docketnew->f,
            'g' => $docketnew->g,
            'h' => $docketnew->h,
            'i' => $docketnew->i,
            'j' => $docketnew->j,
            'filea' => $docketnew->filea,
            'fileb' => $docketnew->fileb,
            'filec' => $docketnew->filec,
            'filed' => $docketnew->filed,
            'filee' => $docketnew->filee,
            'filef' => $docketnew->filef,
            'fileg' => $docketnew->fileg,
            'fileh' => $docketnew->fileh,
            'filei' => $docketnew->filei,
            'filej' => $docketnew->filej,
        ]);
    }
    else {
        return response()->json(['error' => 'Data customer tidak ditemukan.'], 404);
    }
}

    public function edit($id){

        $job = Prodev::find($id);
        $boxes = Box::all();
        return view('role.prodev.prodevkadept.job.edit',compact('boxes','job'));
    }

    public function print($id){
        $job = Prodev::find($id);
        return view('role.prodev.prodevkadept.job.print', compact('job'));
    }

     public function updateStatusJob(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');

        // Validasi data jika diperlukan

        // Temukan Materialrequest berdasarkan ID
        $job = Prodev::find($id);

        // Perbarui status
        $job->statusjob = $newStatus;
        $job->save();

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
     public function reqEditJob(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $noteedit = $request->input('noteedit');

        // Validasi data jika diperlukan

        // Temukan Materialrequest berdasarkan ID
        $job = Prodev::find($id);

        // Perbarui status
        $job->statusjob = $newStatus;
        $job->noteedit = $noteedit;
        $job->save();

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
    public function downloadTable(){
                $response = new StreamedResponse(function() {
                $handle = fopen('php://output', 'w');
                // Tambahkan header CSV
                fputcsv($handle, [
                    'SC',
                    'TANGGAL SC',
                    'EDIT SC',
                    'NOTESC',
                    'JOB',
                    'TANGGALJOB',
                    'EDIT JOB',
                    'STATUSJOB',
                    'STATUSPRODUCT',
                    'PRODUCT',
                    'PO',
                    'SAP',
                    'SCODE',
                    'CUSTOMER',
                    'CLIENT',
                    'PLANT',
                    'ADDRESS',
                    'MATERIAL',
                    'SIZE',
                    'SPECS',
                    'FINISHINGSC',
                    'QTY',
                    'UNIT',
                    'TOLERANSI',
                    'ORIGINALSAMPLE',
                    'DESIGNBENTUK',
                    'TGLTERIMA',
                    'DOCKET',
                    'STATUSDOCKET',
                    'ACTCOLOR',
                    'F1',
                    'F2',
                    'F3',
                    'F4',
                    'F5',
                    'F6',
                    'B1',
                    'B2',
                    'B3',
                    'B4',
                    'B5',
                    'B6',
                    'FINISHINGJOB',
                    'ACUANWARNA',
                    'PACKING',
                    'NOPS',
                    'BOXNAME',
                    'BOXSIZE',
                    'BOXSPECS',
                    'NWBOX',
                    'APPLICATION',
                    'LAYOUT',
                    'NAMALAYOUT',
                    'UP',
                    'UKPRESSLAYOUT',
                    'MAT1',
                    'AS1',
                    'MAT2',
                    'AS1',
                    'MAT3',
                    'AS3',
                    'PISAU',
                    'CITTO',
                    'EMBOSS',
                    'HOTPRINT',
                    'NOTEDESIGNREQ',
                    'NOTEDJOB',
                ]);

                // Ambil data dari database dan tulis ke CSV
                $rows = Prodev::all();
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->nosc?? '',
                        $row->createdsc ?? '',
                        $row->updatedsc ?? '',
                        $row->notesc ?? '',
                        $row->id ?? '',
                        $row->created_at ?? '',
                        $row->updated_at ?? '',
                        $row->statusjob ?? '',
                        $row->status ?? '',
                        $row->product ?? '',
                        $row->po ?? '',
                        $row->sap ?? '',
                        $row->scode ?? '',
                        $row->customer ?? '',
                        $row->client ?? '',
                        $row->plantcode ?? '',
                        $row->address ?? '',
                        $row->material ?? '',
                        $row->size ?? '',
                        $row->specs ?? '',
                        $row->finishing ?? '',
                        $row->qty ?? '',
                        $row->unit ?? '',
                        $row->toleransi ?? '',
                        $row->original ?? '',
                        $row->design ?? '',
                        $row->tanggalterima ?? '',
                        $row->designno ?? '',
                        $row->statusdesign ?? '',
                        $row->actcolor ?? '',
                        $row->f1 ?? '',
                        $row->f2 ?? '',
                        $row->f3 ?? '',
                        $row->f4 ?? '',
                        $row->f5 ?? '',
                        $row->f6 ?? '',
                        $row->b1 ?? '',
                        $row->b2 ?? '',
                        $row->b3 ?? '',
                        $row->b4 ?? '',
                        $row->b5 ?? '',
                        $row->b6 ?? '',
                        $row->finishingjob ?? '',
                        $row->acuanwarna ?? '',
                        $row->packing ?? '',
                        $row->nops ?? '',
                        $row->boxname ?? '',
                        $row->boxspecs ?? '',
                        $row->boxsize ?? '',
                        $row->nwbox ?? '',
                        $row->aplikasi ?? '',
                        $row->layout ?? '',
                        $row->namalayout ?? '',
                        $row->ukpresslayout ?? '',
                        $row->up ?? '',
                        $row->mat1 ?? '',
                        $row->mat2 ?? '',
                        $row->mat3 ?? '',
                        $row->as1 ?? '',
                        $row->as2 ?? '',
                        $row->as3 ?? '',
                        $row->pisau ?? '',
                        $row->citto ?? '',
                        $row->emboss ?? '',
                        $row->hotprint ?? '',
                        $row->note2 ?? '',
                        $row->note1 ?? '',
                    ]);
                }
                fclose($handle);
            });
            $response->headers->set('Content-Type', 'text/csv');
            $response->headers->set('Content-Disposition', 'attachment; filename="DatabaseJOB.csv"');
            return $response;
    }
}

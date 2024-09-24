<?php

namespace App\Http\Controllers;

use App\Models\Purchasing;
use App\Models\Inventorylist;
use App\Models\Inventory;
use App\Models\Arrival;
use App\Models\Materialrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArrivalpurchasingController extends Controller
{
  
      public function index(Request $request)
    {
       $sort = $request->input('sort', 'created'); // Default sort by created
    $query = Arrival::query();
    $dept = $request->input('dept', null);

    if ($dept) {
        $query->where('dept', $dept);
    }

    // Menambahkan pengurutan berdasarkan kondisi
    if ($sort === 'created_at-asc') {
        $query->orderBy('created_at', 'asc');
    }  else {
        // Menambahkan default pengurutan jika tidak ada yang sesuai
        $query->orderBy('created_at', 'desc');
    }

    // Menambahkan pencarian ke dalam query
    if ($request->has('search')) {
        $query->where('po', 'LIKE', '%' . $request->search . '%')
            ->orWhere('item', 'LIKE', '%' . $request->search . '%');
    }

    // Menambahkan paginate dan latest
    $perPage = 15;
    $arrivals = $query->latest('created_at')->paginate($perPage);
        return view('role.purchasing.arrival.listarrival',compact('arrivals'));
    }
     
         public function updatestatus(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $note = $request->input('note');

        // Validasi data jika diperlukan

        // Temukan Materialrequest berdasarkan ID
        $arrival = Arrival::find($id);

        // Perbarui status
        $arrival->status = $newStatus;
        $arrival->note = $note;
        $arrival->save();

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }


public function store(Request $request)
    {
        
        
                    
         Inventorylist::create([
                'item' => $request->item,
                'specs' => $request->specs,
                'size' => $request->size,
                'qty' => $request->qty,
                'created' => $request->created,
                'dept' => $request->dept,
                'pic' => $request->pic,
                'type' => $request->type,
                'unit' => $request->unit,
                'tanggalbeli' => $request->tanggalbeli,
                'po' => $request->po,
                'vendor' => $request->vendor,
                'remarks' => $request->remarks,
                'lokasi' => $request->lokasi,
                'garansi' => $request->garansi,
                'maintenance' => $request->maintenance,
                'ittipedevice' => $request->ittipedevice,
                'itram' => $request->itram,
                'itos' => $request->itos,
                'ituser' => $request->ituser,
                'ithdd' => $request->ithdd,
                'itip' => $request->itip,
                'itmerk' => $request->itmerk,
                'statuspemakaian' => $request->statuspemakaian,
                'safetystock' => $request->safetystock,
                    ]);

         if ($request->hasFile('sjimage')) {
                $image = $request->file('sjimage');
                $imageName = 'sj_' . time() . '.' . $image->getClientOriginalExtension();
        
                // Simpan gambar ke direktori penyimpanan menggunakan Storage
                Storage::disk('public')->put('images/' . $imageName, file_get_contents($image));
        
                // Menyimpan data ke dalam database
                Arrival::create([
                    'po' => $request->po,
                    'nomorsj' => $request->nomorsj,
                    'item' => $request->item,
                    'specs' => $request->specs,
                    'size' => $request->size,
                    'type' => $request->type,
                    'dept' => $request->dept,
                    'created' => $request->created,
                    'status' => $request->status,
                    'unit' => $request->unit,
                    'qty' => $request->qty,
                    'status' => $request->status,
                    'arrivalqty' => json_encode($request->arrivalqty),
                    'arrivaldate' => json_encode($request->arrivaldate),
                    'sjimage' => 'images/' . $imageName, // Menyimpan path relatif ke dalam storage
                ]);
                 
                 $item = Inventory::where('item', $request->item)->first();
                        if ($item) {
                            // Jika item sudah ada, tambahkan qty
                            $item->qty += $request->qty;
                            $item->save();
                        } else {
                            // Jika item belum ada, buat item baru
                            Inventory::create([
                                'item' => $request->item,
                                'specs' => $request->specs,
                                'size' => $request->size,
                                'qty' => $request->qty,
                                'created' => $request->created,
                                'dept' => $request->dept,
                                'pic' => $request->pic,
                                'type' => $request->type,
                                'unit' => $request->unit,
                                'tanggalbeli' => $request->tanggalbeli,
                                'po' => $request->po,
                                'vendor' => $request->vendor,
                                'remarks' => $request->remarks,
                                'lokasi' => $request->lokasi,
                                'garansi' => $request->garansi,
                                'maintenance' => $request->maintenance,
                                'ittipedevice' => $request->ittipedevice,
                                'itram' => $request->itram,
                                'itos' => $request->itos,
                                'ituser' => $request->ituser,
                                'ithdd' => $request->ithdd,
                                'itip' => $request->itip,
                                'itmerk' => $request->itmerk,
                                'statuspemakaian' => $request->statuspemakaian,
                                'safetystock' => $request->safetystock,
                            ]);
                        }
                        $table1 = Purchasing::find($request->po);
                    if ($table1) {
                        $table1->idarrival = 1;
                        $table1->save();
                    }
    return redirect()->back()->with('success', 'Product Updated Successfully');
        
            }


    }
    
    
    public function edit(Request $request,$id){
        $arrival=Arrival::find($id);
        return view('role.purchasing.arrival.partial', compact('arrival'));
    }

    
public function update(Request $request, $id) {

    $item = Inventory::where('item', $request->item)->first();
                        if ($item) {
                            // Jika item sudah ada, tambahkan qty
                            $item->qty += $request->qty;
                            $item->save();
                        } 
                        

    $arrival = Arrival::find($id);
    // Mendapatkan data baru dari input formulir
    $newQty = $request->arrivalqty;
    $newDate = $request->arrivaldate;

    // Membuat array baru dari data formulir

    // Menyimpan kembali data ke dalam model
    $arrival->arrivalqty = json_encode($newQty);
    $arrival->arrivaldate = json_encode($newDate);
    $arrival->save();

       return redirect()->back()->with('success', 'Product Updated Successfully');
}







     public function show(Request $request,$id)
        {
            $materialrequest = Purchasing::find($id); 
            $arrivals = Arrival::all(); 
    
            return view('role.purchasing.arrival.createarrival', compact('materialrequest','arrivals'));
        }

}
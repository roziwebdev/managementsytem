<?php

namespace App\Http\Controllers\Prodev;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\Designnumber;
use App\Models\Docket;
use App\Models\Packaging;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesignController extends Controller
{
    public function index(Request $request){
        $boxes = Box::all();
        $sales = Sales::all();
         // Mengumpulkan semua produk dari setiap penjualan
        $allProducts = $sales->flatMap(function ($sale) {
            return json_decode($sale->product);
        });

        // Menghapus duplikat dari semua produk dan urutkan secara alfabetis
        $uniqueProducts = collect($allProducts)->unique()->sort()->values();
        $packaging = Packaging::orderBy('id', 'desc')->get();
        $query = Designnumber::query();

        if($request->has('search')) {
            $searchValue = $request->input('search');
            $query->where(function ($q) use ($searchValue) {
                $q->where('designno', 'like', '%' . $searchValue . '%')
                    ->orWhere('product', 'like', '%' . $searchValue . '%');
            });
        }
        $designs = $query->orderBy('id', 'desc')->paginate(20);

        return view('role.prodev.prodevdept.design.listdesign', compact("uniqueProducts","packaging","designs", "boxes"));
    }

    public function store(Request $request){
        $design = new Designnumber;
        $design->designno = $request->designno;
        $design->product = $request->product;
        $design->original = $request->original;
        $design->design = $request->design;
        $design->statusorder = $request->statusorder;
        $design->actcolor = $request->actcolor;
        $design->f1 = $request->f1;
        $design->f2 = $request->f2;
        $design->f3 = $request->f3;
        $design->f4 = $request->f4;
        $design->f5 = $request->f5;
        $design->f6 = $request->f6;
        $design->b1 = $request->b1;
        $design->b2 = $request->b2;
        $design->b3 = $request->b3;
        $design->b4 = $request->b4;
        $design->b5 = $request->b5;
        $design->b6 = $request->b6;
        $design->finishingjob = $request->finishingjob;
        $design->acuanwarna = $request->acuanwarna;
        $design->packing = $request->packing;
        $design->nops = $request->nops;
        $design->boxname = $request->boxname;
        $design->boxspecs = $request->boxspecs;
        $design->boxsize = $request->boxsize;
        $design->nwbox = $request->nwbox;
        $design->aplikasi = $request->aplikasi;
        $design->layout = $request->layout;
        $design->ukpresslayout = $request->ukpresslayout;
        $design->mat1 = $request->mat1;
        $design->mat2 = $request->mat2;
        $design->mat3 = $request->mat3;
        $design->as1 = $request->as1;
        $design->as2 = $request->as2;
        $design->as3 = $request->as3;
        $design->pisau= $request->pisau;
        $design->citto= $request->citto;
        $design->emboss= $request->emboss;
        $design->hotprint= $request->hotprint;
        $design->note1= $request->note1;
        $design->note2= $request->note2;
        $design->note3= $request->note3;
        $design->notedesignrequest= $request->notedesignrequest;
        $design->save();
        return redirect()->route('designnumber.index');
    }

     public function show($id)
    {
        $details = Designnumber::find($id);
        return view('role.prodev.prodevdept.design.show', compact('details'));
    }

    public function edit ($id){
        $design = Designnumber::find($id);
        return view('',compact('design'));
    }

    public function update(Request $request, $id){

        $design = Designnumber::find($id);
        $design->product = $request->product;
        $design->designno = $request->designno;
        $design->original = $request->original;
        $design->design = $request->design;
        $design->tanggalterima = $request->tanggalterima;
        $design->statusorder = $request->statusorder;
        $design->actcolor = $request->actcolor;
        $design->f1 = $request->f1;
        $design->f2 = $request->f2;
        $design->f3 = $request->f3;
        $design->f4 = $request->f4;
        $design->f5 = $request->f5;
        $design->f6 = $request->f6;
        $design->b1 = $request->b1;
        $design->b2 = $request->b2;
        $design->b3 = $request->b3;
        $design->b4 = $request->b4;
        $design->b5 = $request->b5;
        $design->b6 = $request->b6;
        $design->finishingjob = $request->finishingjob;
        $design->acuanwana = $request->acuanwana;
        $design->packing = $request->packing;
        $design->nops = $request->nops;
        $design->boxname = $request->boxname;
        $design->boxspecs = $request->boxspecs;
        $design->boxsize = $request->boxsize;
        $design->nwbox = $request->nwbox;
        $design->aplikasi = $request->aplikasi;
        $design->layout = $request->layout;
        $design->ukpresslayout = $request->ukpresslayout;
        $design->mat1 = $request->mat1;
        $design->mat2 = $request->mat2;
        $design->mat3 = $request->mat3;
        $design->as1 = $request->as1;
        $design->as2 = $request->as2;
        $design->as3 = $request->as3;
        $design->pisau= $request->pisau;
        $design->citto= $request->citto;
        $design->emboss= $request->emboss;
        $design->hotprint= $request->hotprint;
        $design->note1= $request->note1;
        $design->note2= $request->note2;
        $design->note3= $request->note3;
        $design->notedesignrequest= $request->notedesignrequest;
        $design->save();
        return redirect()->route('designnumber.index');
    }

    public function destroy($id){
        $design = Designnumber::find($id);
        $design->delete();
        return redirect()->back();
    }

    public function getdatadocket($nodocket){
        $docket = Docket::where('nodocket', $nodocket)->first();
        if($docket){
            return response()->json(['product' => $docket->product]);
        } else {
            return response()->json(['error' => 'Data Docket tidak ditemukan']);
        }
    }
    public function getdatapackaging($pn){
        $packaging = Packaging::where('pn', $pn)->first();
        if($pn){
            return response()->json([
                'nwpcs' => $packaging->nwpcs,
                'estimasipackaging' => $packaging->estimasipackaging,
                'isibox' => $packaging->isibox,
                'boxkg' => $packaging->boxkg,
                'boxcode' => $packaging->boxcode,
                'boxname' => $packaging->boxname,
                'boxspecs' => $packaging->boxspecs,
                'boxsize' => $packaging->boxsize,
                'boxdalampanjang' => $packaging->boxdalampanjang,
                'boxdalamlebar' => $packaging->boxdalamlebar,
                'boxdalamtinggi' => $packaging->boxdalamtinggi,
                'boxluarpanjang' => $packaging->boxluarpanjang,
                'boxluarlebar' => $packaging->boxluarlebar,
                'boxluartinggi' => $packaging->boxluartinggi,
                'effective' => $packaging->effective,
                'preparedate' => $packaging->preparedate,
                'suplier' => $packaging->suplier,
                'isi' => $packaging->isi,
                'isiboxsap' => $packaging->isiboxsap,
                'sapataubendel' => $packaging->sapataubendel,
                'susunan' => $packaging->susunan,
                'gambar1' => $packaging->gambar1,
                'gambar2' => $packaging->gambar2,
                'gambar3' => $packaging->gambar3,
                'gambar4' => $packaging->gambar4,
                'gambar5' => $packaging->gambar5,
                'notepackaging' => $packaging->notepackaging,
            ]);
        } else {
            return response()->json(['error' => 'Data Docket tidak ditemukan']);
        }
    }

       public function getdatabox($boxname){
        $boxes = Box::where('boxname', $boxname)->first();

        if ($boxes) {
            return response()->json(['size' => $boxes->size, 'specs' => $boxes->specs]);
        } else {
            return response()->json(['error' => 'Data customer tidak ditemukan.'], 404);
        }
    }

     public function updateFileDesign(Request $request, $id)
    {
        $designrequest = Designnumber::find($id);

        $oldImageOrPdf = $designrequest->filedesign;

        if ($request->hasFile('filedesign')) {
            // Hapus file lama
            if ($oldImageOrPdf !== null) {
                Storage::delete('public/path/to/your/image/' . $oldImageOrPdf);
            }
            // Upload file baru
            $fileNameWithExt = $request->file('filedesign')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('filedesign')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('filedesign')->storeAs('public/path/to/your/image/', $fileNameToStore);
            $designrequest->filedesign = $fileNameToStore;
        }
        $designrequest->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function updateStatusDocket(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $designrequest = Designnumber::find($id);

        $designrequest->statusdocket = $newStatus;
        $designrequest->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    public function updateStatusLayout(Request $request, $id)
    {
        $newStatus = $request->input('newStatusLayout');
        $designrequest = Designnumber::find($id);

        $designrequest->statuslayout = $newStatus;
        $designrequest->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

}

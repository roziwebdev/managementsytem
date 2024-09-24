<?php

namespace App\Http\Controllers\Prodev\KadeptProdev;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\Designnumber;
use App\Models\Docket;
use App\Models\Packaging;
use App\Models\Sales;
use App\Models\Prodev;
use App\Models\Prodevnonppn;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesignKadeptController extends Controller
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

        return view('role.prodev.prodevkadept.design.listdesign', compact("uniqueProducts","packaging","designs", "boxes"));
    }

    public function store(Request $request){
        $design = new Designnumber;
        $design->designno = $request->sap;
        $design->designno = $request->designno;
        $design->product = $request->product;
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
        $design->acuanwarna = $request->acuanwarna;
        $design->packing = $request->packing;
        
        
        $design->packing = $request->packing; //isibox
        $design->nops = $request->nops;
        $design->boxname = $request->boxname;
        $design->boxspecs = $request->boxspecs;
        $design->boxsize = $request->boxsize;
        $design->nwbox = $request->nwbox; //boxkg
        $design->nwpcs = $request->nwpcs;
        $design->estimasipackaging = $request->estimasipackaging;
        $design->boxdalampanjang = $request->boxdalampanjang;
        $design->boxdalamlebar = $request->boxdalamlebar;
        $design->boxdalamtinggi = $request->boxdalamtinggi;
        $design->boxluarpanjang = $request->boxluarpanjang;
        $design->boxluarlebar = $request->boxluarlebar;
        $design->boxluartinggi = $request->boxluartinggi;
        $design->effective = $request->effective;
        $design->preparedate = $request->preparedate;
        $design->suplier = $request->suplier;
        $design->isi = $request->isi;
        $design->isiboxsap = $request->isiboxsap;
        $design->sapataubendel = $request->sapataubendel;
        $design->susunan = $request->susunan;
        $design->gambar1 = $request->gambar1;
        $design->gambar2 = $request->gambar2;
        $design->gambar3 = $request->gambar3;
        $design->gambar4 = $request->gambar4;
        $design->gambar5 = $request->gambar5;
        $design->notepackaging = $request->notepackaging;
        
        
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
        return redirect()->route('kadeptdesignnumber.index');
    }

     public function show($id)
    {
        $details = Designnumber::find($id);
        return view('role.prodev.prodevkadept.design.show', compact('details'));
    }

    public function edit ($id){
        $packaging = Packaging::orderBy('id', 'desc')->get();
        $sales = Sales::all();
        $allProducts = $sales->flatMap(function ($sale) {
            return json_decode($sale->product);
        });

        // Menghapus duplikat dari semua produk dan urutkan secara alfabetis
        $uniqueProducts = collect($allProducts)->unique()->sort()->values();
        $boxes = Box::all();
        $design = Designnumber::find($id);
        return view('role.prodev.prodevkadept.design.editdesign',compact('design','boxes','uniqueProducts','packaging'));
    }

    public function update(Request $request, $id){

        $design = Designnumber::find($id);
        $oldDesignno = $design->designno;
        $design->designno = $request->designno;
        $design->sap = $request->sap;
        $design->product = $request->product;
        $design->original = $request->original;
        $design->design = $request->design;
        $design->up = $request->up;
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
        $design->acuanwarna = $request->acuanwarna;
        $design->packing = $request->packing;
       
       
        $design->packing = $request->packing; //isibox
        $design->nops = $request->nops;
        $design->boxname = $request->boxname;
        $design->boxspecs = $request->boxspecs;
        $design->boxsize = $request->boxsize;
        $design->nwbox = $request->nwbox; //boxkg
        $design->nwpcs = $request->nwpcs;
        $design->estimasipackaging = $request->estimasipackaging;
        $design->boxdalampanjang = $request->boxdalampanjang;
        $design->boxdalamlebar = $request->boxdalamlebar;
        $design->boxdalamtinggi = $request->boxdalamtinggi;
        $design->boxluarpanjang = $request->boxluarpanjang;
        $design->boxluarlebar = $request->boxluarlebar;
        $design->boxluartinggi = $request->boxluartinggi;
        $design->effective = $request->effective;
        $design->preparedate = $request->preparedate;
        $design->suplier = $request->suplier;
        $design->isi = $request->isi;
        $design->isiboxsap = $request->isiboxsap;
        $design->sapataubendel = $request->sapataubendel;
        $design->susunan = $request->susunan;
        $design->gambar1 = $request->gambar1;
        $design->gambar2 = $request->gambar2;
        $design->gambar3 = $request->gambar3;
        $design->gambar4 = $request->gambar4;
        $design->gambar5 = $request->gambar5;
        $design->notepackaging = $request->notepackaging;
       
       
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
        $design->save();
        
        Prodev::where('designno', $oldDesignno)
            ->where('statusjob', 'Revised')
            ->update([
                'designno' => $request->input('designno'),
                'up' => $request->input('up'),
                'original' => $request->input('original'),
                'design' => $request->input('design'),
                'tanggalterima' => $request->input('tanggalterima'),
                'statusdesign' => $request->input('statusorder'),
                'actcolor' => $request->input('actcolor'),
                'f1' => $request->input('f1'),
                'f2' => $request->input('f2'),
                'f3' => $request->input('f3'),
                'f4' => $request->input('f4'),
                'f5' => $request->input('f5'),
                'f6' => $request->input('f6'),
                'b1' => $request->input('b1'),
                'b2' => $request->input('b2'),
                'b3' => $request->input('b3'),
                'b4' => $request->input('b4'),
                'b5' => $request->input('b5'),
                'b6' => $request->input('b6'),
                'finishingjob' => $request->input('finishingjob'),
                'acuanwarna' => $request->input('acuanwarna'),
                'packing' => $request->input('packing'),
                'nops' => $request->input('nops'),
                'boxname' => $request->input('boxname'),
                'boxspecs' => $request->input('boxspecs'),
                'boxsize' => $request->input('boxsize'),
                'nwbox' => $request->input('nwbox'),
                'aplikasi' => $request->input('aplikasi'),
                'layout' => $request->input('layout'),
                'ukpresslayout' => $request->input('ukpresslayout'),
                'mat1' => $request->input('mat1'),
                'mat2' => $request->input('mat2'),
                'mat3' => $request->input('mat3'),
                'as1' => $request->input('as1'),
                'as2' => $request->input('as2'),
                'as3' => $request->input('as3'),
                'pisau' => $request->input('pisau'),
                'citto' => $request->input('citto'),
                'emboss' => $request->input('emboss'),
                'hotprint' => $request->input('hotprint'),
                'note1' => $request->input('note1'),
                'note2' => $request->input('note2'),
                'note3' => $request->input('note3'),

            ]);
        Prodev::where('designno', $oldDesignno)
            ->where('statusjob', 'Waiting')
            ->update([
                'designno' => $request->input('designno'),
                'up' => $request->input('up'),
                'original' => $request->input('original'),
                'design' => $request->input('design'),
                'tanggalterima' => $request->input('tanggalterima'),
                'statusdesign' => $request->input('statusorder'),
                'actcolor' => $request->input('actcolor'),
                'f1' => $request->input('f1'),
                'f2' => $request->input('f2'),
                'f3' => $request->input('f3'),
                'f4' => $request->input('f4'),
                'f5' => $request->input('f5'),
                'f6' => $request->input('f6'),
                'b1' => $request->input('b1'),
                'b2' => $request->input('b2'),
                'b3' => $request->input('b3'),
                'b4' => $request->input('b4'),
                'b5' => $request->input('b5'),
                'b6' => $request->input('b6'),
                'finishingjob' => $request->input('finishingjob'),
                'acuanwarna' => $request->input('acuanwarna'),
                'packing' => $request->input('packing'),
                'nops' => $request->input('nops'),
                'boxname' => $request->input('boxname'),
                'boxspecs' => $request->input('boxspecs'),
                'boxsize' => $request->input('boxsize'),
                'nwbox' => $request->input('nwbox'),
                'aplikasi' => $request->input('aplikasi'),
                'layout' => $request->input('layout'),
                'ukpresslayout' => $request->input('ukpresslayout'),
                'mat1' => $request->input('mat1'),
                'mat2' => $request->input('mat2'),
                'mat3' => $request->input('mat3'),
                'as1' => $request->input('as1'),
                'as2' => $request->input('as2'),
                'as3' => $request->input('as3'),
                'pisau' => $request->input('pisau'),
                'citto' => $request->input('citto'),
                'emboss' => $request->input('emboss'),
                'hotprint' => $request->input('hotprint'),
                'note1' => $request->input('note1'),
                'note2' => $request->input('note2'),
                'note3' => $request->input('note3'),

            ]);
            
        Prodevnonppn::where('designno', $oldDesignno)
            ->where('statusjob', 'Revised')
            ->update([
                'designno' => $request->input('designno'),
                'up' => $request->input('up'),
                'original' => $request->input('original'),
                'design' => $request->input('design'),
                'tanggalterima' => $request->input('tanggalterima'),
                'statusdesign' => $request->input('statusorder'),
                'actcolor' => $request->input('actcolor'),
                'f1' => $request->input('f1'),
                'f2' => $request->input('f2'),
                'f3' => $request->input('f3'),
                'f4' => $request->input('f4'),
                'f5' => $request->input('f5'),
                'f6' => $request->input('f6'),
                'b1' => $request->input('b1'),
                'b2' => $request->input('b2'),
                'b3' => $request->input('b3'),
                'b4' => $request->input('b4'),
                'b5' => $request->input('b5'),
                'b6' => $request->input('b6'),
                'finishingjob' => $request->input('finishingjob'),
                'acuanwarna' => $request->input('acuanwarna'),
                'packing' => $request->input('packing'),
                'nops' => $request->input('nops'),
                'boxname' => $request->input('boxname'),
                'boxspecs' => $request->input('boxspecs'),
                'boxsize' => $request->input('boxsize'),
                'nwbox' => $request->input('nwbox'),
                'aplikasi' => $request->input('aplikasi'),
                'layout' => $request->input('layout'),
                'ukpresslayout' => $request->input('ukpresslayout'),
                'mat1' => $request->input('mat1'),
                'mat2' => $request->input('mat2'),
                'mat3' => $request->input('mat3'),
                'as1' => $request->input('as1'),
                'as2' => $request->input('as2'),
                'as3' => $request->input('as3'),
                'pisau' => $request->input('pisau'),
                'citto' => $request->input('citto'),
                'emboss' => $request->input('emboss'),
                'hotprint' => $request->input('hotprint'),
                'note1' => $request->input('note1'),
                'note2' => $request->input('note2'),
                'note3' => $request->input('note3'),

            ]);
        Prodevnonppn::where('designno', $oldDesignno)
            ->where('statusjob', 'Waiting')
            ->update([
                'designno' => $request->input('designno'),
                'up' => $request->input('up'),
                'original' => $request->input('original'),
                'design' => $request->input('design'),
                'tanggalterima' => $request->input('tanggalterima'),
                'statusdesign' => $request->input('statusorder'),
                'actcolor' => $request->input('actcolor'),
                'f1' => $request->input('f1'),
                'f2' => $request->input('f2'),
                'f3' => $request->input('f3'),
                'f4' => $request->input('f4'),
                'f5' => $request->input('f5'),
                'f6' => $request->input('f6'),
                'b1' => $request->input('b1'),
                'b2' => $request->input('b2'),
                'b3' => $request->input('b3'),
                'b4' => $request->input('b4'),
                'b5' => $request->input('b5'),
                'b6' => $request->input('b6'),
                'finishingjob' => $request->input('finishingjob'),
                'acuanwarna' => $request->input('acuanwarna'),
                'packing' => $request->input('packing'),
                'nops' => $request->input('nops'),
                'boxname' => $request->input('boxname'),
                'boxspecs' => $request->input('boxspecs'),
                'boxsize' => $request->input('boxsize'),
                'nwbox' => $request->input('nwbox'),
                'aplikasi' => $request->input('aplikasi'),
                'layout' => $request->input('layout'),
                'ukpresslayout' => $request->input('ukpresslayout'),
                'mat1' => $request->input('mat1'),
                'mat2' => $request->input('mat2'),
                'mat3' => $request->input('mat3'),
                'as1' => $request->input('as1'),
                'as2' => $request->input('as2'),
                'as3' => $request->input('as3'),
                'pisau' => $request->input('pisau'),
                'citto' => $request->input('citto'),
                'emboss' => $request->input('emboss'),
                'hotprint' => $request->input('hotprint'),
                'note1' => $request->input('note1'),
                'note2' => $request->input('note2'),
                'note3' => $request->input('note3'),

            ]);
         
        return redirect()->route('kadeptdesignnumber.index');
    }

    public function destroy($id){
        $design = Designnumber::find($id);
        $design->delete();
        return redirect()->back();
    }


    public function getdatapackaging($pn){
        $packaging = Packaging::where('pn', $pn)->first();
        if($pn){
            return response()->json([
                'nwpcs' => $packaging->nwpcs,
                'estimasipacking' => $packaging->estimasipacking,
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

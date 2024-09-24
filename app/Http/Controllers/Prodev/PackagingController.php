<?php

namespace App\Http\Controllers\Prodev;

use App\Http\Controllers\Controller;
use App\Models\Box;
use App\Models\Packaging;
use Illuminate\Http\Request;

class PackagingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $boxes = Box::all(); 
        $query = Packaging::query();

        if($request->has('search')) {
            $searchValue = $request->input('search');
            $query->where(function ($q) use ($searchValue) {
                $q->where('pn', 'like', '%' . $searchValue . '%')
                    ->orWhere('product', 'like', '%' . $searchValue . '%')
                    ->orWhere('designno', 'like', '%' . $searchValue . '%')
                    ->orWhere('boxname', 'like', '%' . $searchValue . '%');
            });
        }
        
         $query->orderBy('id', 'desc');

        $packagings = $query->paginate(20);


        return view('role.prodev.prodevdept.packaging.listpackaging', compact('packagings','boxes'));
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
        $packaging = new Packaging;
        $packaging->pn = $request->pn;
        $packaging->designno = $request->designno;
        $packaging->product = $request->product;
        $packaging->sap = $request->sap;
        $packaging->nwpcs = $request->nwpcs;
        $packaging->isibox = $request->isibox;
        $packaging->boxkg = $request->boxkg;
        $packaging->boxcode = $request->boxcode;
        $packaging->boxname = $request->boxname;
        $packaging->boxspecs = $request->boxspecs;
        $packaging->boxsize = $request->boxsize;
        $packaging->effective = $request->effective;
        $packaging->preparedate = $request->preparedate;
        $packaging->suplier = $request->suplier;
        $packaging->isi = $request->isi;
        $packaging->isiboxsap = $request->isiboxsap;
        $packaging->estimasipackaging = $request->estimasipackaging;
        $packaging->susunan = $request->susunan;
        $packaging->boxdalampanjang = $request->boxdalampanjang;
        $packaging->boxdalamlebar = $request->boxdalamlebar;
        $packaging->boxdalamtinggi = $request->boxdalamtinggi;
        $packaging->boxluarpanjang = $request->boxluarpanjang;
        $packaging->boxluarlebar = $request->boxluarlebar;
        $packaging->boxluartinggi = $request->boxluartinggi;
        $packaging->sapataubendel = $request->sapataubendel;
        $packaging->created = $request->created;
        $packaging->notepackaging = $request->notepackaging;
        $packaging->status = $request->status;
        
        //gambar
        
            if ($request->hasFile('gambar1')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('gambar1')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('gambar1')->storeAs('public/path/to/your/image/', $fileNameToStore);
            // Set file path in the database
            $packaging->gambar1 = $fileNameToStore;
        }
            if ($request->hasFile('gambar2')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('gambar2')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('gambar2')->storeAs('public/path/to/your/image/', $fileNameToStore);
            // Set file path in the database
            $packaging->gambar2 = $fileNameToStore;
        }
            if ($request->hasFile('gambar3')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('gambar3')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('gambar3')->storeAs('public/path/to/your/image/', $fileNameToStore);
            // Set file path in the database
            $packaging->gambar3 = $fileNameToStore;
        }
            if ($request->hasFile('gambar4')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('gambar4')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar4')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('gambar4')->storeAs('public/path/to/your/image/', $fileNameToStore);
            // Set file path in the database
            $packaging->gambar4 = $fileNameToStore;
        }
            if ($request->hasFile('gambar5')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('gambar5')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar5')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('gambar5')->storeAs('public/path/to/your/image/', $fileNameToStore);
            // Set file path in the database
            $packaging->gambar5 = $fileNameToStore;
        }
    
        $packaging->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Packaging $packaging)
    {
        $packaging = Packaging::find($id);
        return view('role.prodev.prodevdept.packaging.showpackaging', compact('packaging','boxes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $packaging = Packaging::find($id);
        $boxes = Box::all();
        return view('role.prodev.prodevdept.packaging.editpackaging', compact('packaging','boxes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $packaging = Packaging::find($id); 
        $packaging->pn = $request->pn;
        $packaging->designno = $request->designno;
        $packaging->product = $request->product;
        $packaging->sap = $request->sap;
        $packaging->nwpcs = $request->nwpcs;
        $packaging->isibox = $request->isibox;
        $packaging->boxkg = $request->boxkg;
        $packaging->boxcode = $request->boxcode;
        $packaging->boxname = $request->boxname;
        $packaging->boxspecs = $request->boxspecs;
        $packaging->boxsize = $request->boxsize;
        $packaging->effective = $request->effective;
        $packaging->preparedate = $request->preparedate;
        $packaging->suplier = $request->suplier;
        $packaging->isi = $request->isi;
        $packaging->isiboxsap = $request->isiboxsap;
        $packaging->estimasipackaging = $request->estimasipackaging;
        $packaging->susunan = $request->susunan;
        $packaging->boxdalampanjang = $request->boxdalampanjang;
        $packaging->boxdalamlebar = $request->boxdalamlebar;
        $packaging->boxdalamtinggi = $request->boxdalamtinggi;
        $packaging->boxluarpanjang = $request->boxluarpanjang;
        $packaging->boxluarlebar = $request->boxluarlebar;
        $packaging->boxluartinggi = $request->boxluartinggi;
        $packaging->sapataubendel = $request->sapataubendel;
        $packaging->created = $request->created;
        $packaging->notepackaging = $request->notepackaging;
        $packaging->status = $request->status;
        
        //gambar
        
            if ($request->hasFile('gambar1')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('gambar1')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('gambar1')->storeAs('public/path/to/your/image/', $fileNameToStore);
            // Set file path in the database
            $packaging->gambar1 = $fileNameToStore;
        }
            if ($request->hasFile('gambar2')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('gambar2')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('gambar2')->storeAs('public/path/to/your/image/', $fileNameToStore);
            // Set file path in the database
            $packaging->gambar2 = $fileNameToStore;
        }
            if ($request->hasFile('gambar3')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('gambar3')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('gambar3')->storeAs('public/path/to/your/image/', $fileNameToStore);
            // Set file path in the database
            $packaging->gambar3 = $fileNameToStore;
        }
            if ($request->hasFile('gambar4')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('gambar4')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar4')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('gambar4')->storeAs('public/path/to/your/image/', $fileNameToStore);
            // Set file path in the database
            $packaging->gambar4 = $fileNameToStore;
        }
            if ($request->hasFile('gambar5')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('gambar5')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('gambar5')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('gambar5')->storeAs('public/path/to/your/image/', $fileNameToStore);
            // Set file path in the database
            $packaging->gambar5 = $fileNameToStore;
        }
    
        $packaging->save();
        return redirect()->route('packaging.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $packaging = Packaging::find($id);
        $packaging->delete();
        return redirect()->back();
    }
}

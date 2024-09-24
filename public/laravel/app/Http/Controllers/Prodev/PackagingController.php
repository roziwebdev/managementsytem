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
        $packaging->status = $request->status;
        $packaging->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Packaging $packaging)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $packaging = Packaging::find($id);
        return view('', compact('pakcaging'));
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
        $packaging->name = $request->name;
        $packaging->specs = $request->specs;
        $packaging->size = $request->size;
        $packaging->effective = $request->effective;
        $packaging->status = $request->status;
        $packaging->save();
        return redirect()->back();
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

<?php

namespace App\Http\Controllers\Prodev\KadeptProdev;

use App\Http\Controllers\Controller;
use App\Models\Box;
use Illuminate\Http\Request;

class BoxKadeptController extends Controller
{
    public function index(Request $request)
    { 
        $query = Box::query();

        if($request->has('search')) {
            $searchValue = $request->input('search');
            $query->where(function ($q) use ($searchValue) {
                $q->where('boxcode', 'like', '%' . $searchValue . '%')
                    ->orWhere('boxname', 'like', '%' . $searchValue . '%');
            });
        }
        
        $query->orderBy('id', 'desc');
        $boxes = $query->paginate(20);

        return view('role.prodev.prodevkadept.box.listbox', compact('boxes'));
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
        $boxes = new Box;
        $boxes->boxcode = $request->boxcode;
        $boxes->boxname = $request->boxname;
        $boxes->size = $request->size;
        $boxes->specs = $request->specs;
        $boxes->toleransi = $request->toleransi;
        $boxes->note1 = $request->note1;
        $boxes->note2 = $request->note2;
        $boxes->note3 = $request->note3;
        $boxes->note4 = $request->note4;
        $boxes->save();
        return redirect()->route('kadeptboxes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $boxes = Box::find($id);
        return view('role.prodev.prodevkadept.box.editbox', compact('boxes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $boxes = Box::find($id);
        $boxes->boxcode = $request->boxcode;
        $boxes->boxname = $request->boxname;
        $boxes->size = $request->size;
        $boxes->specs = $request->specs;
        $boxes->toleransi = $request->toleransi;
        $boxes->note1 = $request->note1;
        $boxes->note2 = $request->note2;
        $boxes->note3 = $request->note3;
        $boxes->note4 = $request->note4;
        $boxes->save();
        return redirect()->route('kadeptboxes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        //
    }
}

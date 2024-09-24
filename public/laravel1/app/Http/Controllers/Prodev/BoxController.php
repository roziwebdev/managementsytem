<?php

namespace App\Http\Controllers\Prodev;
use App\Http\Controllers\Controller;

use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $boxes = Box::all();
        return view('role.prodev.prodevdept.box.listbox', compact('boxes'));
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
        $boxes->boxname = $request->boxname;
        $boxes->size = $request->size;
        $boxes->specs = $request->specs;
        $boxes->toleransi = $request->toleransi;
        $boxes->note1 = $request->note1;
        $boxes->note2 = $request->note2;
        $boxes->note3 = $request->note3;
        $boxes->save();
        return redirect()->route('boxes.index');
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
    public function edit(Box $box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Box $box)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Box $box)
    {
        //
    }
}

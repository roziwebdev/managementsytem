<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendorcreate');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type = new Type;
        $type->type = $request->type;
        $type->save();

        if ($type->type == 'PP') {
            return redirect()->route('vendor.pp');
        } else if ($type->type == 'CH') {
            return redirect()->route('vendor.ch');
        } else if ($type->type == 'INK') {
            return redirect()->route('vendor.ink');
        } else if ($type->type == 'LL') {
            return redirect()->route('vendor.ll');
        } else if ($type->type == 'EKP') {
            return redirect()->route('vendor.ekp');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //
    }
}

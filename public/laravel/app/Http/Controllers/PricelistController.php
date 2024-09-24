<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PricelistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function indexmanager(Request $request)
{
        $query = Pricelist::query();
        $sortBy = $request->input('sort_by', null);
            if (!$sortBy) {
                // Jika tidak ada query pencarian, urutkan berdasarkan updated_at terbaru
                $query->orderBy('id','desc');
            } elseif ($sortBy == 'asc') {
                // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
                $query->orderBy('id');
            } elseif ($sortBy == 'desc') {
                // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
                $query->orderByDesc('id');
            }

        // Menambahkan pencarian ke dalam query
        if ($request->has('search')) {
            $query->where('id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('item', 'LIKE', '%' . $request->search . '%');
        }

        $pricelist = $query->paginate(15);

    return view('role.purchasing.mrmanager.listpricelist', compact('pricelist', 'query'));
}
 public function index(Request $request)
{
    $query = $request->input('search');

    // Jika ada pencarian
    if ($query) {
        $pricelist = Pricelist::where('item', 'like', '%' . $query . '%')
            ->orWhere('item', 'like', '%' . $query . '%')
            ->latest()
            ->paginate(10);
    } else {
        // Jika tidak ada pencarian, tampilkan semua
        $pricelist = Pricelist::latest()->paginate(10);
    }

    return view('role.purchasing.listpricelist', compact('pricelist', 'query'));
}
   public function store(Request $request)
{
    try {
        $user = new Pricelist;
        $user->item = $request->item;
        $user->type = $request->type;
        $user->arahserat = $request->arahserat;
        $user->size = $request->size;
        $user->specs = $request->specs;
        $user->price = $request->price;
        $user->unit = $request->unit;
        $user->save();

        return response()->json($user, 200); // Menyertakan data baru yang ditambahkan dalam respons JSON.
    } catch (QueryException $e) {
        \Log::error($e->getMessage());

        return response()->json(['error' => 'Terjadi kesalahan saat menyimpan data.'], 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Pricelist $pricelist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pricelist = Pricelist::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$pricelist) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.formpricelistedit', ['pricelist' => $pricelist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pricelist = Pricelist::find($id);

        // Periksa apakah data ditemukan
        if (!$pricelist) {
            return redirect()->route('pricelist.index')->with('error', 'Product not found');
        }

        // Update atribut-atribut Pricelist dengan data baru
     
        $pricelist->item = $request->item;
        $pricelist->type = $request->type;
        $pricelist->arahserat = $request->arahserat;
        $pricelist->size = $request->size;
        $pricelist->specs = $request->specs;
        $pricelist->price = $request->price;
        $pricelist->unit = $request->unit;

        $pricelist->save();

        return redirect()->route('pricelist.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pricelist = Pricelist::find($id);

        // Periksa apakah data ditemukan
        if (!$pricelist) {
            return redirect()->route('pricelist.index')->with('error', 'Product not found');
        }

        // Hapus data dari basis data
        $pricelist->delete();

        return redirect()->route('pricelist.index')->with('success', 'Product Deleted Successfully');
    }
}

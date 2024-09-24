<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexmanager(Request $request)
    {
        $sort = $request->input('sort', 'created'); // Default sort by created
        $query = Supplier::query();

        if ($sort === 'created_at') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort === 'created_at') {
            $query->orderBy('created_at', 'desc'); // Mengurutkan descending jika 'ascending' dipilih
        } elseif ($sort === 'supplier-asc') {
            $query->orderBy('supplier', 'asc'); // Sesuaikan dengan nama kolom yang sesuai
        } elseif ($sort === 'supplier-desc') {
            $query->orderBy('supplier', 'desc'); // Sesuaikan dengan nama kolom yang sesuai
        } elseif ($sort === 'id-asc') {
            $query->orderBy('id', 'asc'); // Sesuaikan dengan nama kolom yang sesuai
        } elseif ($sort === 'id-desc') {
            $query->orderBy('id', 'desc'); // Sesuaikan dengan nama kolom yang sesuai
        }

        // Menambahkan pencarian ke dalam query
        if ($request->has('search')) {
            $query->where('id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('supplier', 'LIKE', '%' . $request->search . '%');
        }

        $supplier = $query->paginate(15);
        return view('role.purchasing.mrmanager.listsupplier', compact('supplier', 'sort'));
    }
    
    
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'created'); // Default sort by created
        $query = Supplier::query();

        if ($sort === 'created_at') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort === 'created_at') {
            $query->orderBy('created_at', 'desc'); // Mengurutkan descending jika 'ascending' dipilih
        } elseif ($sort === 'supplier-asc') {
            $query->orderBy('supplier', 'asc'); // Sesuaikan dengan nama kolom yang sesuai
        } elseif ($sort === 'supplier-desc') {
            $query->orderBy('supplier', 'desc'); // Sesuaikan dengan nama kolom yang sesuai
        } elseif ($sort === 'id-asc') {
            $query->orderBy('id', 'asc'); // Sesuaikan dengan nama kolom yang sesuai
        } elseif ($sort === 'id-desc') {
            $query->orderBy('id', 'desc'); // Sesuaikan dengan nama kolom yang sesuai
        }

        // Menambahkan pencarian ke dalam query
        if ($request->has('search')) {
            $query->where('id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('supplier', 'LIKE', '%' . $request->search . '%');
        }

        $supplier = $query->paginate(15);
        return view('role.purchasing.listsupplier', compact('supplier', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.purchasing.formsupplier');
    }

    /**
     * Store a newly created resource in storage.
     */
     
      public function store(Request $request)
{
    try {
        $user = new Supplier;
        $user->jenis = $request->jenis;
        $user->supplier = $request->supplier;
        $user->cp = $request->cp;
        $user->telp = $request->telp;
        $user->leadtime = $request->leadtime;
        $user->material = $request->material;
        $user->alamat = $request->alamat;
        $user->rekening = $request->rekening;
        $user->bank = $request->bank;
        $user->email = $request->email;

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
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suplier = Supplier::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$suplier) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.formsupplieredit', ['suplier' => $suplier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Temukan data Supplier berdasarkan ID
        $suplier = Supplier::find($id);

        // Periksa apakah data ditemukan
        if (!$suplier) {
            return redirect()->route('supplier.index')->with('error', 'Supplier not found');
        }

        // Update atribut-atribut Supplier dengan data baru
        $suplier->jenis = $request->jenis;
        $suplier->supplier = $request->supplier;
        $suplier->cp = $request->cp;
        $suplier->telp = $request->telp;
        $suplier->leadtime = $request->leadtime;
        $suplier->material = $request->material;
        $suplier->alamat = $request->alamat;
        $suplier->rekening = $request->rekening;
        $suplier->bank = $request->bank;
        $suplier->email = $request->email;

        $suplier->save();

        return redirect()->route('supplier.index')->with('success', 'Supplier Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suplier = Supplier::find($id);

        // Periksa apakah data ditemukan
        if (!$suplier) {
            return redirect()->route('supplier.index')->with('error', 'Product not found');
        }

        // Hapus data dari basis data
        $suplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Product Deleted Successfully');
    }
}

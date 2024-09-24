<?php

namespace App\Http\Controllers\Sales;


use App\Models\Productsales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductsalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Productsales::query();

    // Pencarian berdasarkan ID atau produk
    if ($request->has('search')) {
        $searchValue = $request->input('search');

        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('product', 'like', '%' . $searchValue . '%');
        });
    };


    // Filter produk berdasarkan ascending (asc) atau descending (desc)
    $sortBy = $request->input('sort_by', null);

    if (!$sortBy) {
        // Jika tidak ada query pencarian, urutkan berdasarkan updated_at terbaru
        $query->orderByDesc('updated_at');
    } elseif ($sortBy == 'asc') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
        $query->orderBy('id');
    } elseif ($sortBy == 'desc') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
        $query->orderByDesc('id');
    } elseif ($sortBy == 'ascproduct') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan product secara ascending
        $query->orderBy('product');
    } elseif ($sortBy == 'descproduct') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan product secara descending
        $query->orderByDesc('product');
    }

    // Ambil data berdasarkan query yang telah dibuat
    $productsales = $query->paginate(20);
        return view('role.sales.salesdept.productsales.listproductsales', compact('productsales'));
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
        $productsales= new Productsales;
        $productsales->product = $request->product;
        $productsales->specs = $request->specs;
        $productsales->size = $request->size;
        $productsales->sap = $request->sap;
        $productsales->material = $request->material;
        $productsales->finishing = $request->finishing;
        $productsales->unit = $request->unit;
        $productsales->save();
        return redirect()->route('productsales.index');
    }
    
    
    public function searchproductsales(Request $request)
    {
        $query = $request->input('query');
        $resultsproductsales = Productsales::where('product', '=', $query)->get();

       return view('role.sales.salesdept.salescontract.search-product', compact('resultsproductsales'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Priceproduct $priceproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priceproduct $priceproduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Priceproduct $priceproduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priceproduct $priceproduct)
    {
        //
    }
}

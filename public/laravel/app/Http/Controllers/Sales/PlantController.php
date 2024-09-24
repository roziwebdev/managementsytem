<?php

namespace App\Http\Controllers\Sales;

use App\Models\Plant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Plant::query();

           if ($request->has('search')) {
        $searchValue = $request->input('search');

            $query->where(function ($q) use ($searchValue) {
                $q->where('id', $searchValue)
                    ->orWhere('plant', 'like', '%' . $searchValue . '%')
                    ->orWhere('customer', 'like', '%' . $searchValue . '%');
        });
    }

    // Filter produk berdasarkan ascending (asc) atau descending (desc)
    $sortBy = $request->input('sort_by', null);

    if (!$sortBy) {
        // Jika tidak ada query pencarian, urutkan berdasarkan updated_at terbaru
        $query->orderBy('id');
    } elseif ($sortBy == 'asc') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
        $query->orderBy('id');
    } elseif ($sortBy == 'desc') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
        $query->orderByDesc('id');
    } elseif ($sortBy == 'ascplant') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan product secara ascending
        $query->orderBy('plant');
    } elseif ($sortBy == 'descplant') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan product secara descending
        $query->orderByDesc('plant');
    } elseif ($sortBy == 'asccustomer') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan product secara ascending
        $query->orderBy('customer');
    } elseif ($sortBy == 'desccustomer') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan product secara descending
        $query->orderByDesc('customer');
    }

    // Ambil data berdasarkan query yang telah dibuat
        $plant = $query->paginate(15);
        return view('role.sales.salesdept.plant.listplant', compact('plant'));
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
        $plant = new Plant;
        $plant->customer = $request->customer;
        $plant->plant = $request->plant;
        $plant->kodeplant = $request->kodeplant;
        $plant->phone = $request->phone;
        $plant->address = $request->address;
        $plant->save();
        return redirect()->route('plant.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plant $plant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $plant = Plant::find($id);
        return view('role.sales.salesdept.plant.listplantedit', compact('plant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $plant = Plant::find($id);
        $plant->customer = $request->customer;
        $plant->plant = $request->plant;
        $plant->kodeplant = $request->kodeplant;
        $plant->phone = $request->phone;
        $plant->address = $request->address;
        $plant->save();
        return redirect()->route('plant.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plant $plant)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Materialrequest;
use Illuminate\Http\Request;

class PurchasingmrController extends Controller
{
    public function index(Request $request)
    {


        $sort = $request->input('sort', 'created'); // Default sort by created
        $query = Materialrequest::query();

        if ($sort === 'created') {
            $query->orderBy('created_at', 'asc');
        } elseif ($sort === 'ascending') {
            $query->orderBy('item', 'asc'); // Ganti 'item' dengan kolom yang sesuai
        } elseif ($sort === 'id') {
            $query->orderBy('id', 'asc');
        }

        // Menambahkan pencarian ke dalam query
        if ($request->has('search')) {
            $query->where('id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('item', 'LIKE', '%' . $request->search . '%');
        }

        $materialrequests = $query->paginate(100);

        return view('role.purchasing.mrpurchasing.listmr', compact('materialrequests', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.purchasing.mrpurchasing.formmr');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = new Materialrequest();
        $user->mrdate = $request->mrdate;
        $user->dept = $request->dept;
        $user->sisastock = $request->sisastock;
        $user->lastorder = $request->lastorder;
        $user->alamat = $request->alamat;
        $user->job = $request->job;
        $user->arahseratp = $request->arahseratp;
        $user->arahseratl = $request->arahseratl;
        $user->created = $request->created;

        $user->etauser = json_encode($request->etauser);
        $user->item = json_encode($request->item);
        $user->size = json_encode($request->size);
        $user->specs = json_encode($request->specs);
        $user->qty = json_encode($request->qty);
        $user->save();

        return redirect()->route('materialrequest.index')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materialrequest $materialrequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materialrequest $materialrequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materialrequest $materialrequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materialrequest $materialrequest)
    {
        //
    }
}

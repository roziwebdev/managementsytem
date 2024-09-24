<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Inventorywithdraw;
use Illuminate\Http\Request;

class InventorymanagerwithdrawController extends Controller
{
      public function searchitemresultinvenwd(Request $request)
    {
        $query = $request->input('query');
        $resultsitem = Inventory::where('item', '=', $query)->get();

        return view('role.purchasing.search-resultsinvenwd', compact('resultsitem'));
    }
    public function index()
{
    $items = Inventory::all();
    $withdraws = Inventorywithdraw::all();
    return view('role.purchasing.inventorymanager.withdraw', compact('withdraws','items'));
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
    // Validasi jika qty pengambilan lebih besar dari stok
    $request->validate([
        'item' => 'required',
        'qty' => 'required|numeric|min:0.1',
    ]);

    // Simpan pengambilan ke tabel pengambilan dengan status 'waiting'
    Inventorywithdraw::create([
                'item' => $request->item,
                'specs' => $request->specs,
                'size' => $request->size,
                'qty' => $request->qty,
                'created' => $request->created,
                'dept' => $request->dept,
                'pic' => $request->pic,
                'type' => $request->type,
                'unit' => $request->unit,
                'tanggalbeli' => $request->tanggalbeli,
                'po' => $request->po,
                'vendor' => $request->vendor,
                'remarks' => $request->remarks,
                'lokasi' => $request->lokasi,
                'garansi' => $request->garansi,
                'maintenance' => $request->maintenance,
                'ittipedevice' => $request->ittipedevice,
                'itram' => $request->itram,
                'itos' => $request->itos,
                'ituser' => $request->ituser,
                'ithdd' => $request->ithdd,
                'itip' => $request->itip,
                'itmerk' => $request->itmerk,
                'statuspemakaian' => $request->statuspemakaian,
                'safetystock' => $request->safetystock,
                'status' => 'waiting',
    ]);

    return redirect()->route('inventorymgr.index')->with('success', 'Pengambilan berhasil disimpan.');
}

public function updateStatus($id)
{
    $withdraw = Inventorywithdraw::findOrFail($id);

    // Ubah status menjadi 'approve' dan kurangi stok di tabel item
    if ($withdraw->status === 'waiting') {
        $item = Inventory::where('item', $withdraw->item)->first();

        if (!$item || $withdraw->qty > $item->qty) {
            // Tampilkan pesan kesalahan jika stok tidak mencukupi
            return redirect()->back()->withErrors(['error' => 'Qty pengambilan melebihi stok yang ada.']);
        }

        $item->qty -= $withdraw->qty;
        $item->save();

        $withdraw->status = 'approve';
        $withdraw->save();
    }

    return redirect()->back()->with('success', 'Status pengambilan berhasil diubah.');
}

    /**
     * Display the specified resource.
     */
    public function show(Inventorywithdraw $inventorywithdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventorywithdraw $inventorywithdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventorywithdraw $inventorywithdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventorywithdraw $inventorywithdraw)
    {
        //
    }
}

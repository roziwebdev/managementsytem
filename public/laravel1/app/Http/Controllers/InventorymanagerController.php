<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Inventorylist;
use App\Models\Inventorywithdraw;
use Illuminate\Http\Request;

class InventorymanagerController extends Controller
{
    public function searchitemresultinven(Request $request)
    {
        $query = $request->input('query');
        $resultsitem = Inventory::where('item', '=', $query)->get();

        return view('role.purchasing.search-resultsinven', compact('resultsitem'));
    }
    public function index(Request $request) 
    {
           $sort = $request->input('sort', 'created'); // Default sort by created
    $query = Inventory::query();
    $type = $request->input('type', null);
    if ($type) {
        $query->where('type', $type);
    }
    
    $dept = $request->input('dept', null);
    if ($dept) {
        $query->where('dept', $dept);
    }

    $defaultOrder = 'desc';

    if ($sort === 'created') {
        $query->orderBy('created_at', $defaultOrder);
    }

    if ($request->has('search')) {
        $query->where('id', 'LIKE', '%' . $request->search . '%')
            ->orWhere('item', 'LIKE', '%' . $request->search . '%');
    }

    if($request->has('dept') || $request->has('type')) {
        $items = $query->get();
    } else {
        $items = $query->paginate(15);
    }
    
    $itemlist = Inventorylist::latest()->paginate(15);
        return view('role.purchasing.inventorymanager.index', compact('items','itemlist'));
    }
    public function indexitem()
    {
        $items = Inventory::latest()->paginate(15);
        $itemlist = Inventorylist::latest()->paginate(15);
        return view('role.purchasing.inventorymanager.indexitem', compact('items','itemlist'));
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
        Inventorylist::create([
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
            ]);

        $item = Inventory::where('item', $request->item)->first();

        if ($item) {
            // Jika item sudah ada, tambahkan qty
            $item->qty += $request->qty;
            $item->save();
        } else {
            // Jika item belum ada, buat item baru
            Inventory::create([
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
            ]);
        }
        return redirect()->route('inventorymgr.index');
    }

    /**
     * Display the specified resource.
     */
 public function show($id, Request $request)
    {
       // Ambil data produk
    $item = Inventory::find($id);

    // Ambil data barang dengan nama yang sama
    $inventorylist = Inventorylist::where('item', $item->item);

    // Ambil data benda dengan nama yang sama
    $inventorywd = Inventorywithdraw::where('item', $item->item);

    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $month = $request->input('month');

    if ($startDate && $endDate) {
        $inventorylist = $inventorylist->whereBetween('created_at', [$startDate, $endDate]);
        $inventorywd = $inventorywd->whereBetween('created_at', [$startDate, $endDate]);
    } elseif ($month) {
        $inventorylist = $inventorylist->whereMonth('created_at', $month);
        $inventorywd = $inventorywd->whereMonth('created_at', $month);
    }

    $inventorylist = $inventorylist->get();
    $inventorywd = $inventorywd->get();

    $totalQtyIn = $inventorylist->sum('qty');
    $totalQtyOut = $inventorywd->sum('qty');
    $diff = $totalQtyIn - $totalQtyOut;
        return view('role.purchasing.inventorymanager.show', compact('item', 'inventorylist', 'inventorywd', 'totalQtyIn','totalQtyOut', 'diff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}

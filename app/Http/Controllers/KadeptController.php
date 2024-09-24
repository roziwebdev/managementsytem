<?php

namespace App\Http\Controllers;

use App\Models\Materialrequest;
use App\Models\Pricelist;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KadeptController extends Controller
{
  

        public function index(Request $request)
{
    $sort = $request->input('sort', 'created'); // Default sort by created
    $query = Materialrequest::query();
     $item  = Pricelist::all();
    $dept = $request->input('dept', null);
    if ($dept) {
        $query->where('dept', $dept);
    }

    $status = $request->input('status', null);
    if ($status) {
        $query->where('status', $status);
    }

    // Set default ordering to descending for 'created_at'
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
            ->orWhere('item', 'LIKE', '%' . $request->search . '%')
            ->orWhere('kosong1','LIKE','%'.$request->search . '%');
    }

    $materialrequests = $query->paginate(15);

    return view('role.purchasing.mrkadept.listmr', compact('materialrequests', 'sort', 'item'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = Pricelist::all();
        return view('role.purchasing.mrkadept.formmr',compact('item'));

    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {

        $user = new Materialrequest();

        $user->dept = $request->dept;
        $user->alamat = $request->alamat;
        $user->job = $request->job;
        $user->arahseratl = $request->arahseratl;
        $user->created = $request->created;
        $user->status = $request->status;
        $user->type = $request->type;
        $user->kosong2 = $request->kosong2;
        $user->box1 = json_encode($request->box1);
        $user->box2 = json_encode($request->box2);
        $user->box3 = json_encode($request->box3);
        $user->lastorder = json_encode($request->lastorder);
        $user->lastpo = json_encode($request->lastpo);
        $user->lastprice = json_encode($request->lastprice);
        $user->sisastock = json_encode($request->sisastock);
        $user->kosong3 = json_encode($request->kosong3);
        $user->arahseratp = json_encode($request->arahseratp);
        $user->mrdate = json_encode($request->mrdate);
        $user->etauser = json_encode($request->etauser);
        $user->item = json_encode($request->item);
        $user->size = json_encode($request->size);
        $user->specs = json_encode($request->specs);
        $user->qty = json_encode($request->qty);
        $user->panjang = json_encode($request->panjang);
        $user->lebar = json_encode($request->lebar);
        $user->tinggi = json_encode($request->tinggi);
        $user->save();

        return redirect()->route('kadeptmr.index')->with('success', 'Product Added Successfully');
    }
    
     public function update(Request $request, $id)
    {

        $user = Materialrequest::find($id);
        $user->requestedit = $request->requestedit;
        $user->alamat = $request->alamat;
        $user->job = $request->job;
        $user->arahseratl = $request->arahseratl;
        $user->kosong2 = $request->kosong2;
        $user->kosong1 = $request->kosong1;
        $user->box1 = json_encode($request->box1);
        $user->box2 = json_encode($request->box2);
        $user->box3 = json_encode($request->box3);
        $user->lastorder = json_encode($request->lastorder);
        $user->lastpo = json_encode($request->lastpo);
        $user->lastprice = json_encode($request->lastprice);
        $user->sisastock = json_encode($request->sisastock);
        $user->kosong3 = json_encode($request->kosong3);
        $user->arahseratp = json_encode($request->arahseratp);
        $user->mrdate = json_encode($request->mrdate);
        $user->etauser = json_encode($request->etauser);
        $user->item = json_encode($request->item);
        $user->size = json_encode($request->size);
        $user->specs = json_encode($request->specs);
        $user->qty = json_encode($request->qty);
        $user->panjang = json_encode($request->panjang);
        $user->lebar = json_encode($request->lebar);
        $user->tinggi = json_encode($request->tinggi);
        $user->save();

        return redirect()->route('kadeptmr.index')->with('success', 'Product Added Successfully');
    }

    public function show($id)
    {
        $materialrequest = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.detailmr', ['materialrequest' => $materialrequest]);
    }

    public function updateStatuskadept(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');

        // Validasi data jika diperlukan

        // Temukan Materialrequest berdasarkan ID    


        $materialrequest = Materialrequest::find($id);

        if (!$materialrequest) {
            // Tambahkan log atau tindakan lain jika Materialrequest tidak ditemukan
            return redirect()->back()->with('error', 'Materialrequest tidak ditemukan.');
        }

        // Perbarui status
        $materialrequest->status = $newStatus;
        $materialrequest->requestedit = $request->requestedit;;
        $materialrequest->approvalkadept_at = $request->approvalkadept_at;
        $materialrequest->save();

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
    
        public function checkData(Request $request)
        {
            $item = $request->input('item');
        
            // Lakukan pengecekan data di model Purchasing
            $purchasings = DB::table('purchasings')
                ->whereRaw("JSON_CONTAINS(LOWER(`item`), '\"".strtolower($item)."\"')")
                ->orderByDesc('id')
                ->take(3)
                ->get();
        
            $results = [];
        
            foreach ($purchasings as $purchasing) {
                $itemArray = json_decode($purchasing->item);
                $tanggalitemArray = json_decode($purchasing->tanggalitem);
                $priceArray = json_decode($purchasing->price);
        
                // Cari indeks nama1 di dalam array nama2 (case-insensitive)
                $index = array_search(strtolower($item), array_map('strtolower', $itemArray));
        
                if ($index !== false && isset($tanggalitemArray[$index]) && isset($priceArray[$index])) {
                    // Jika indeks ditemukan, ambil id, tanggal2, dan hargaitem yang sesuai
                    $id = $purchasing->id; // tambahkan ini
                    $tanggalitem = $tanggalitemArray[$index];
                    $price = $priceArray[$index];
                    $results[] = ['id' => $id, 'tanggalitem' => $tanggalitem, 'price' => $price];
                }
            }
        
            if (!empty($results)) {
                // Kembalikan hasilnya dalam format JSON
                return response()->json(['exists' => true, 'data' => $results]);
            }
            // Jika tidak ditemukan atau terjadi kesalahan, kembalikan flag exists false
            return response()->json(['exists' => false]);
        }
    public function edit($id)
    {
        $user = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai
        $item = Pricelist::all();
        return view('role.purchasing.mrkadept.formmredit',compact('item','user'));
    }
    

    
}

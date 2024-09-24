<?php

namespace App\Http\Controllers;
use App\Models\Pricelist;
use App\Models\Materialrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeptController extends Controller
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
                ->orWhere('kosong1','LIKE','%'.$request->search. '%');
        }
    
        $materialrequests = $query->paginate(15);
    
        return view('role.purchasing.mrdept.listmr', compact('materialrequests', 'sort','item'));
    }
  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     $item = Pricelist::all();
        return view('role.purchasing.mrdept.formmr',compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
       public function store(Request $request)
{
        $materialRequest = new Materialrequest;
        $materialRequest->dept = $request->dept;
        $materialRequest->alamat = $request->alamat;
        $materialRequest->job = $request->job;
        $materialRequest->arahseratl = $request->arahseratl;
        $materialRequest->created = $request->created;
        $materialRequest->status = $request->status;
        $materialRequest->type = $request->type;
        $materialRequest->kosong2 = $request->kosong2;
        $materialRequest->kosong1 = $request->kosong1;
        $materialRequest->box1 = json_encode($request->box1);
        $materialRequest->box2 = json_encode($request->box2);
        $materialRequest->box3 = json_encode($request->box3);
        $materialRequest->lastorder = json_encode($request->lastorder);
        $materialRequest->lastpo = json_encode($request->lastpo);
        $materialRequest->lastprice = json_encode($request->lastprice);
        $materialRequest->sisastock = json_encode($request->sisastock);
        $materialRequest->kosong3 = json_encode($request->kosong3);
        $materialRequest->arahseratp = json_encode($request->arahseratp);
        $materialRequest->mrdate = json_encode($request->mrdate);
        $materialRequest->etauser = json_encode($request->etauser);
        $materialRequest->item = json_encode($request->item);
        $materialRequest->size = json_encode($request->size);
        $materialRequest->specs = json_encode($request->specs);
        $materialRequest->qty = json_encode($request->qty);
        $materialRequest->panjang = json_encode($request->panjang);
        $materialRequest->lebar = json_encode($request->lebar);
        $materialRequest->tinggi = json_encode($request->tinggi);
        $materialRequest->save();
        return redirect()->route('deptmr.index')->with('success', 'Product Added Successfully');
    
}
     
     
    // public function store(Request $request)
    // {

    //  try {
    //     $materialRequest = new Materialrequest();

    //     // Set other attributes as needed
    //     $materialRequest->dept = $request->dept;
    //     $materialRequest->alamat = $request->alamat;
    //     $materialRequest->job = $request->job;
    //     $materialRequest->arahseratl = $request->arahseratl;
    //     $materialRequest->created = $request->created;
    //     $materialRequest->status = $request->status;
    //     $materialRequest->type = $request->type;
    //     $materialRequest->kosong2 = $request->kosong2;
    //     $materialRequest->kosong1 = $request->kosong1;
    //     $materialRequest->box1 = json_encode($request->box1);
    //     $materialRequest->box2 = json_encode($request->box2);
    //     $materialRequest->box3 = json_encode($request->box3);
    //     $materialRequest->lastorder = json_encode($request->lastorder);
    //     $materialRequest->sisastock = json_encode($request->sisastock);
    //     $materialRequest->kosong3 = json_encode($request->kosong3);
    //     $materialRequest->arahseratp = json_encode($request->arahseratp);
    //     $materialRequest->mrdate = json_encode($request->mrdate);
    //     $materialRequest->etauser = json_encode($request->etauser);
    //     $materialRequest->item = json_encode($request->item);
    //     $materialRequest->size = json_encode($request->size);
    //     $materialRequest->specs = json_encode($request->specs);
    //     $materialRequest->qty = json_encode($request->qty);

    //     $materialRequest->save();

    //   return response()->json($user, 200); // Menyertakan data baru yang ditambahkan dalam respons JSON.
    // } catch (QueryException $e) {
    //     \Log::error($e->getMessage());

    //     return response()->json(['error' => 'Terjadi kesalahan saat menyimpan data.'], 500);
    // }
    // }
    
    public function update(Request $request, $id)
    {

        $user = Materialrequest::find($id);
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

        return redirect()->route('deptmr.index')->with('success', 'Product Added Successfully');
    }

    public function show($id)
        {
            $materialrequest = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai
    
            if (!$materialrequest) {
                abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
            }
    
            return view('role.purchasing.detailmr', ['materialrequest' => $materialrequest]);
        }
    
    public function edit($id)
        {
            $user = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai
    
            $item = Pricelist::all();
            return view('role.purchasing.mrdept.formmredit',compact('item','user'));
        }
    
     public function showarrival($id)
        {
            $materialrequest = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai
    
            if (!$materialrequest) {
                abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
            }
    
            return view('role.purchasing.arrival.formarrival', compact('materialrequest'));
        }
    
    public function destroy($id)
        {
            $materialrequest = Materialrequest::findOrFail($id);
            $materialrequest->delete();
             return redirect()->route('deptmr.index')->with('error', 'Failed to delete Material Request');
        }
    
    
    
    public function checkData(Request $request)
{
    $item = strtolower($request->input('item'));
    
    // Lakukan pengecekan data di model Purchasing
    $purchasings = DB::table('purchasings')
        ->whereRaw("JSON_CONTAINS(LOWER(`item`), '\"".strtolower($item)."\"')")
        ->orderByDesc('id')
        ->get();

    $results = [];

    foreach ($purchasings as $purchasing) {
        // Decode JSON fields
        $itemArray = json_decode($purchasing->item, true);
        $tanggalitemArray = json_decode($purchasing->tanggalitem, true);
        $priceArray = json_decode($purchasing->price, true);

        // Loop melalui setiap elemen dalam array item
        foreach ($itemArray as $index => $itemValue) {
            if (strtolower($itemValue) === $item) {
                // Ambil data lainnya
                $id = $purchasing->id;
                $tanggalitem = isset($tanggalitemArray[$index]) ? $tanggalitemArray[$index] : null;
                $price = isset($priceArray[$index]) ? $priceArray[$index] : null;

                // Jika tanggalitem dan price ada, tambahkan ke hasil
                if ($tanggalitem !== null && $price !== null) {
                    $results[] = ['id' => $id, 'tanggalitem' => $tanggalitem, 'price' => $price];
                }
            }
        }
    }

    if (!empty($results)) {
        // Kembalikan hasilnya dalam format JSON
        return response()->json(['exists' => true, 'data' => $results]);
    }
    // Jika tidak ditemukan atau terjadi kesalahan, kembalikan flag exists false
    return response()->json(['exists' => false]);
}

    

}

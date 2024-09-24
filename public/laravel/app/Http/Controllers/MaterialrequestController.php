<?php

namespace App\Http\Controllers;

use App\Models\Materialrequest;
use App\Models\Purchasing;
use App\Models\Nama;
use App\Models\Pricelist;
use App\Models\Chat;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MaterialrequestController extends Controller
{
          public function showdetailmr($id)
    {
        $materialrequest = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.formmr', ['materialrequest' => $materialrequest]);
    }
 public function index(Request $request)
    {
    $chats = Chat::all();
    $sort = $request->input('sort', 'created'); // Default sort by created
    $query = Materialrequest::query();
    $dept = $request->input('dept', null);
    if ($dept) {
        $query->where('dept', $dept);
    }

   
    $status = $request->input('status', null);
       $allowedStatus = ['Edit','Declined', 'Approve', 'Approve GM', 'Approve CEO', 'Waiting List', 'Approve Safira', 'Approve Stephanie'];
    $query->whereIn('status', $allowedStatus);


    if ($status && in_array($status, $allowedStatus)) {
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
            ->orWhere('kosong1', 'LIKE', '%' . $request->search . '%')
            ->orWhere('job', 'LIKE', '%' . $request->search . '%');
    }

    $materialrequests = $query->paginate(15);

        return view('role.purchasing.mr.listmr', compact('materialrequests', 'sort','chats'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.purchasing.mr.formmr');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = new Materialrequest();
        $user->dept = $request->dept;
        $user->sisastock = $request->sisastock;
        $user->lastorder = $request->lastorder;
        $user->alamat = $request->alamat;
        $user->job = $request->job;
        $user->arahseratl = $request->arahseratl;
        $user->created = $request->created;
        $user->status = $request->status;
        $user->type = $request->type;
        $user->kosong1 = $request->kosong1;
        $user->kosong2 = $request->kosong2;
        $user->kosong3 = json_encode($request->kosong3);
        $user->arahseratp = json_encode($request->arahseratp);
        $user->mrdate = json_encode($request->mrdate);
        $user->etauser = json_encode($request->etauser);
        $user->item = json_encode($request->item);
        $user->size = json_encode($request->size);
        $user->specs = json_encode($request->specs);
        $user->qty = json_encode($request->qty);
        $user->save();

        return redirect()->route('mr.index')->with('success', 'Product Added Successfully');
    }

    public function show($id)
    {
      
        $materialrequest = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.detailmr', compact( 'materialrequest'));
    }
    
    
        public function showidpo($id)
    {
      
        $materialrequest = Purchasing::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.formponoprice', compact( 'materialrequest'));
    }
    
    
    
      public function showpo($id)
    {
          $item = Pricelist::all();
        $supplier = Supplier::all();
        $materialrequest = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.detailmrpo', compact('supplier', 'item', 'materialrequest'));
    }
    
      public function shownopo($id)
    {
          $item = Pricelist::all();
        $supplier = Supplier::all();
        $materialrequest = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.detailmrnopo', compact('supplier', 'item', 'materialrequest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $materialrequest = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.detailmr', ['materialrequest' => $materialrequest]);
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
    
     public function updateStatus(Request $request, $id)
    {
          $newStatus = $request->input('newStatus');
        $note = $request->input('note');

        // Validasi data jika diperlukan

        // Temukan Materialrequest berdasarkan ID
        $materialrequest = Materialrequest::find($id);

        if (!$materialrequest) {
            // Tambahkan log atau tindakan lain jika Materialrequest tidak ditemukan
            return redirect()->back()->with('error', 'Materialrequest tidak ditemukan.');
        }

        // Perbarui status
        $materialrequest->status = $newStatus;
        $materialrequest->arahseratl = $note;
        $materialrequest->save();

        // Redirect atau kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}

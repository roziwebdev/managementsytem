<?php

namespace App\Http\Controllers;

use App\Models\Materialrequest;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
   public function index(Request $request)
    {
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

    // Set default ordering to descending for 'created_at
    
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
            ->orWhere('job', 'LIKE', '%' . $request->search . '%')
            ->orWhere('kosong1', 'LIKE', '%' . $request->search . '%');
    }

    $materialrequests = $query->paginate(15);

        return view('role.purchasing.mrmanager.listmr', compact('materialrequests', 'sort','dept','status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role.purchasing.mrmanager.formmr');
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

        return redirect()->route('manager.index')->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materialrequest = Materialrequest::find($id); // Gantilah DataModel dengan model Anda yang sesuai

        if (!$materialrequest) {
            abort(404); // Menampilkan halaman 404 jika data tidak ditemukan
        }

        return view('role.purchasing.formmrmanager', ['materialrequest' => $materialrequest]);
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

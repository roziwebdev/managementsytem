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
       $allowedStatus = ['Declined', 'Approve', 'Approve GM', 'Approve CEO', 'Waiting List', 'Approve Safira', 'Approve Stephanie'];
    $query->whereIn('status', $allowedStatus);


    if ($status && in_array($status, $allowedStatus)) {
        $query->where('status', $status);
    }

    // Set default ordering to descending for 'created_at'
    $defaultOrder = 'desc';

    if ($sort === 'created') {
        $query->orderBy('created_at', $defaultOrder);
    } elseif ($sort === 'ascending') {
        $query->orderBy('created_at', 'asc');
    } elseif ($sort === 'mrdate-asc') {
        $query->orderBy('mr_date', 'asc');
    } elseif ($sort === 'mrdate-desc') {
        $query->orderBy('mr_date', $defaultOrder);
    } elseif ($sort === 'mrnumber-asc') {
        $query->orderBy('id', 'asc');
    } elseif ($sort === 'mrnumber-desc') {
        $query->orderBy('id', $defaultOrder);
    } elseif ($sort === 'item-asc') {
        $query->orderBy('item', 'asc');
    } elseif ($sort === 'item-desc') {
        $query->orderBy('item', $defaultOrder);
    } elseif ($sort === 'job-asc') {
        $query->orderBy('job', 'asc');
    } elseif ($sort === 'job-desc') {
        $query->orderBy('job', $defaultOrder);
    }

    // Menambahkan pencarian ke dalam query
    if ($request->has('search')) {
        $query->where('id', 'LIKE', '%' . $request->search . '%')
            ->orWhere('item', 'LIKE', '%' . $request->search . '%');
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

<?php

namespace App\Http\Controllers\Sales;

use App\Models\Customer;
use App\Models\Sales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Customer::query();

           if ($request->has('search')) {
        $searchValue = $request->input('search');

        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
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
    } elseif ($sortBy == 'ascccustomer') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan product secara ascending
        $query->orderBy('customer');
    } elseif ($sortBy == 'desccustomer') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan product secara descending
        $query->orderByDesc('customer');
    }

    // Ambil data berdasarkan query yang telah dibuat
        $cust = $query->paginate(15);
        return view('role.sales.salesdept.customer.listcustomer', compact('cust'));
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
        $cust = new Customer;
        
        if ($request->hasFile('image')) {
        // Get file name with extension
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        // Get just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // Get just extension
        $extension = $request->file('image')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        // Upload file
        $path = $request->file('image')->storeAs('public/company/imagecustomer/', $fileNameToStore);
        // Set file path in the database
        $cust->image = $fileNameToStore;
    }
        
    //     if ($request->hasFile('image')) {
    //     // Mendapatkan nama file dengan ekstensi
    //     $imageName = time().'.'.$request->image->extension();
    //     // Memindahkan file ke direktori yang diinginkan (misalnya 'public/images')
    //     $request->image->move(public_path('images'), $imageName);
    //     $path = $request->file('filepo')->storeAs('public/path/to/your/image/', $fileNameToStore);
    // }
        
        $cust->customer = $request->customer;
        $cust->npwp = $request->npwp;
        $cust->email = $request->email;
        $cust->phone = $request->phone;
        $cust->up = $request->up;
        $cust->kodecust = $request->kodecust;
        $cust->address = $request->address;
        $cust->save();
        return redirect()->route('customer.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $customer = Customer::find($id);
        $nama = $customer->customer;
        $poterakhir = Sales::where('customer', $nama)->latest('tanggalpo')->first();
        $query= Sales::query();
        
        if($request->has('search')){
            $searchValue = $request->input('search');
            $query->where(function($q) use ($searchValue){
                $q->where('id', $searchValue)
                ->orWhere('product','like','%'. $searchValue .'%')
                ->orWhere('po','like','%'. $searchValue .'%');
            });
        }
        
        $query->where('customer', $nama);
        $purchase = $query->paginate(5);
        return view('role.sales.salesdept.customer.detailcustomer', compact('customer','purchase','poterakhir'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cust = Customer::find($id);
        return view('role.sales.salesdept.customer.listcustomeredit', compact('cust'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cust = Customer::find($id);
        $cust->customer = $request->customer;
        $cust->npwp = $request->npwp;
        $cust->email = $request->email;
        $cust->phone = $request->phone;
        $cust->up = $request->up;
        $cust->kodecust = $request->kodecust;
        
        if ($request->hasFile('image')) {
            // Get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            // Get just extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload file
            $path = $request->file('image')->storeAs('public/company/imagecustomer/', $fileNameToStore);
            // Set file path in the database
            $cust->image = $fileNameToStore;
        } else {
            // Jika tidak ada file yang diunggah, biarkan gambar yang ada
            $fileNameToStore = $cust->image;
        }
        
        //   if ($request->hasFile('image')) {
        //     // Hapus gambar lama jika ada
        //     if ($cust->image) {
        //         unlink(public_path('images/'.$cust->image));
        //     }

        //     // Simpan gambar baru
        //     $imageName = time().'.'.$request->image->extension();
        //     $request->image->move(public_path('images'), $imageName);
        //     $cust->image = $imageName;
        // }
        $cust->save();
        return redirect()->route('customer.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cust = Customer::find($id);
        $cust->delete();
        return redirect()->back();
    }
}

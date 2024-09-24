<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TenderController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('tenders')
            ->select('referensi', DB::raw('MIN(namatender) as namatender'))
            ->groupBy('referensi');

        if ($request->has('search')) {
            $searchValue = $request->input('search');

            $query->where(function($q) use ($searchValue) {
                $q->where('referensi', $searchValue)
                ->orWhere('namatender', 'like', '%' . $searchValue . '%');
            });
        }

        $uniqueNomerRef = $query->paginate(10);

        return view('role.sales.salesdept.tender.listtender', compact('uniqueNomerRef'));
    }

    public function showByNomerRef(Request $request, $referensi)
{
    try {
        // Inisialisasi query
        $query = Tender::where('referensi', $referensi);

        // Jika ada parameter 'search' dalam request
        if ($request->has('search')) {
            $searchValue = $request->input('search');

            // Tambahkan kondisi pencarian pada query
            $query->where(function($q) use ($searchValue) {
                $q->where('sap', $searchValue)
                  ->orWhere('product', 'like', '%' . $searchValue . '%');
            });
        }

        // Paginasi hasil query
        $tenders = $query->paginate(10);

        // Kembalikan tampilan dengan data yang diperlukan
        return view('role.sales.salesdept.tender.tenderbyref', compact('tenders', 'referensi'));
    } catch (\Exception $e) {
        // Jika terjadi error, kembalikan tampilan error
        return view('role.sales.salesdept.tender.tenderbyref', [
            'tenders' => collect(), // Kosongkan hasil jika terjadi error
            'referensi' => $referensi,
            'error' => 'Terjadi kesalahan saat melakukan pencarian: ' . $e->getMessage()
        ]);
    }
}

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);
        $path = $request->file('file')->getRealPath();
        $file = fopen($path, 'r');
        $header = fgetcsv($file);

        while ($row = fgetcsv($file)) {
            $data = array_combine($header, $row);

            // Membuat catatan baru
            Tender::create([
                'idplant' => $data['idplant'],   // Sesuaikan dengan kolom pada file CSV Anda
                'namatender' => $data['namatender'],   // Sesuaikan dengan kolom pada file CSV Anda
                'referensi' => $data['referensi'], // Sesuaikan dengan kolom pada file CSV Anda
                'sap' => $data['sap'], // Sesuaikan dengan kolom pada file CSV Anda
                'product' => $data['product'], // Sesuaikan dengan kolom pada file CSV Anda
                'specs' => $data['specs'], // Sesuaikan dengan kolom pada file CSV Anda
                'quantity' => $data['quantity'], // Sesuaikan dengan kolom pada file CSV Anda
                'unit' => $data['unit'], // Sesuaikan dengan kolom pada file CSV Anda
                'sisa' => $data['sisa'], // Sesuaikan dengan kolom pada file CSV Anda
                'harga' => $data['harga'], // Sesuaikan dengan kolom pada file CSV Anda
                'totalharga' => $data['totalharga'], // Sesuaikan dengan kolom pada file CSV Anda
            ]);
        }
        fclose($file);
        return redirect()->back()->with('success', 'Data Imported Successfully');
    }

    public function edit($id){
        $tender = Tender::find($id);
        return view('role.sales.salesdept.tender.edittender',compact('tender'));
    }
    public function show($id){
        $tender = Tender::find($id);
        return view('role.sales.salesdept.tender.showtender',compact('tender'));
    }

    public function update(Request $request, $id){
        $tender = Tender::find($id);
        $tender->product = $request->product;
        $tender->sap = $request->sap;
        $tender->historyproduct = $request->historyproduct;
        $tender->historysap = $request->historysap;
        $tender->save();
        return redirect()->route('tender.show',$tender->id);
    }



}

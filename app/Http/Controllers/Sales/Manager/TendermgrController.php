<?php

namespace App\Http\Controllers\Sales\Manager;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TendermgrController extends Controller
{

    public function index(Request $request){
        $query = DB::table('tenders')
            ->select('referensi', DB::raw('MIN(namatender) as namatender'))
            ->groupBy('referensi');

            if($request->has('search')) {
                $searchValue = $request->input('search');
                $query->where(function ($q) use ($searchValue) {
                    $q->where('referensi', $searchValue)
                    ->orWhere('namatender', 'like', '%' . $searchValue . '%');
                });
            }
        $uniqueNomerRef = $query->paginate(10);
        return view('role.sales.salesmanager.tender.listtender',compact('uniqueNomerRef'));
        }


    // public function showByNomerRef(Request $request, $referensi){
    //     $query = Tender::where('referensi', $referensi);

    //     if($request->has('search')) {
    //         $searchValue = $request->input('search');
    //         $query->where(function ($q) use ($searchValue) {
    //             $q->where('sap', $searchValue)
    //                 ->orWhere('product', 'like', '%' . $searchValue . '%');
    //         });
    //     }
    //     $tenders = $query->paginate(10);
    //     return view('role.sales.salesmanager.tender.tenderbyref',compact('tenders','referensi'));
    // }

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
            return view('role.sales.salesmanager.tender.tenderbyref',compact('tenders','referensi'));
        } catch (\Exception $e) {
            // Jika terjadi error, kembalikan tampilan error
            return view('role.sales.salesmanager.tender.tenderbyref', [
                'tenders' => collect(), // Kosongkan hasil jika terjadi error
                'referensi' => $referensi,
                'error' => 'Terjadi kesalahan saat melakukan pencarian: ' . $e->getMessage()
            ]);
        }
    }
}

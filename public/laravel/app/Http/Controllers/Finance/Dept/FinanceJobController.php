<?php

namespace App\Http\Controllers\Finance\Dept;

use App\Http\Controllers\Controller;
use App\Models\Prodev;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FinanceJobController extends Controller
{
    public function index(Request $request){
        $query = Prodev::query();
    // Pencarian berdasarkan ID atau produk
    if ($request->has('search')) {
        $searchValue = $request->input('search');

        $query->where(function($q) use ($searchValue) {
            $q->where('id', $searchValue)
              ->orWhere('product', 'like', '%' . $searchValue . '%');
        });
    }

    // Filter produk berdasarkan ascending (asc) atau descending (desc)
    $sortBy = $request->input('sort_by', null);

    if (!$sortBy) {
        // Jika tidak ada query pencarian, urutkan berdasarkan updated_at terbaru
        $query->orderByDesc('updated_at');
    } elseif ($sortBy == 'asc') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan id secara ascending
        $query->orderBy('id');
    } elseif ($sortBy == 'desc') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan id secara descending
        $query->orderByDesc('id');
    }

    // Ambil data berdasarkan query yang telah dibuat
    $job = $query->paginate(20);
        return view('role.finance.dept.job.listjob', compact('job'));
    }
    public function downloadTable(){
                $currentDateTime = Carbon::now()->format('Y-m-d_H-i-s');
                $fileName = "DBJOB" . $currentDateTime . ".csv";
                $response = new StreamedResponse(function() {
                $handle = fopen('php://output', 'w');

                // Tambahkan header CSV
                fputcsv($handle, [
                    'ED JOB',
                    'CR JOB',
                    'ED SC',
                    'CR SC',
                    'GEN',
                    'NO SC',
                    'STAT',
                    'NOTE SC',
                    'JOB',
                    'STATUS',
                    'TGL JOB',
                    'TGL SC',
                    'PO',
                    'TGL PO',
                    'S-CODE',
                    'CUSTOMER',
                    'ID',
                    'ETA',
                    'CLIENT',
                    'PLANTCODE',
                    'ADDRESS',
                    'PRODUCT',
                    'MATERIAL',
                    'SAP',
                    'SIZE',
                    'SPECS',
                    'FINISHING',
                    'QTY',
                    'UNIT',
                    'PRICE',
                    'TOLERANSI',
                    'ORIGINAL SAMPLE',
                    'DESIGN BENTUK',
                    'TGL TERIMA',
                    'DESIGN NO',
                    'STATUS',
                    'ACT COLOR',
                    'F1',
                    'F2',
                    'F3',
                    'F4',
                    'F5',
                    'F6',
                    'B1',
                    'B2',
                    'B3',
                    'B4',
                    'B5',
                    'B6',
                    'FINISHING2',
                    'ACUAN WARNA',
                    'PACKING',
                    'NO PS',
                    'BOX CODE',
                    'BOX',
                    'BOX SPECS',
                    'BOX SIZE',
                    'NW/BOX',
                    'APPLICATION',
                    'LAYOUT',
                    'UP',
                    'UK PRESS LAYOUT',
                    'MAT1',
                    'AS1',
                    'MAT2',
                    'AS1',
                    'MAT3',
                    'AS3',
                    'PISAU',
                    'CITTO',
                    'EMBOSS',
                    'HOTPRINT',
                    'NOTE',
                ]);

                // Ambil data dari database dan tulis ke CSV
                $rows = Prodev::all();
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->updated_at ?? '',
                        $row->created_at?? '',
                        $row->updatedsc ?? '',
                        $row->createdsc ?? '',
                        $row->gen ?? '',
                        $row->nosc ?? '',
                        $row->statussc ?? '',
                        $row->notesc ?? '',
                        $row->id ?? '',
                        $row->status ?? '',
                        $row->created_at ?? '',
                        $row->createdsc ?? '',
                        $row->po ?? '',
                        $row->tanggalpo ?? '',
                        $row->scode ?? '',
                        $row->customer ?? '',
                        $row->idcust ?? '',
                        $row->etauser ?? '',
                        $row->client ?? '',
                        $row->address ?? '',
                        $row->plantcode ?? '',
                        $row->product ?? '',
                        $row->material ?? '',
                        $row->sap ?? '',
                        $row->size ?? '',
                        $row->specs ?? '',
                        $row->finishing ?? '',
                        $row->qty ?? '',
                        $row->unit ?? '',
                        $row->price ?? '',
                        $row->toleransi ?? '',
                        $row->original ?? '',
                        $row->design ?? '',
                        $row->tanggalterima ?? '',
                        $row->designno ?? '',
                        $row->statusdesign ?? '',
                        $row->actcolor ?? '',
                        $row->f1 ?? '',
                        $row->f2 ?? '',
                        $row->f3 ?? '',
                        $row->f4 ?? '',
                        $row->f5 ?? '',
                        $row->f6 ?? '',
                        $row->b1 ?? '',
                        $row->b2 ?? '',
                        $row->b3 ?? '',
                        $row->b4 ?? '',
                        $row->b5 ?? '',
                        $row->b6 ?? '',
                        $row->finishingjob ?? '',
                        $row->acuanwarna ?? '',
                        $row->packing ?? '',
                        $row->nops ?? '',
                        $row->box_code ?? '',
                        $row->boxname ?? '',
                        $row->boxspecs ?? '',
                        $row->boxsize ?? '',
                        $row->nwbox ?? '',
                        $row->aplikasi ?? '',
                        $row->layout ?? '',
                        $row->up ?? '',
                        $row->ukpresslayout ?? '',
                        $row->mat1 ?? '',
                        $row->as1 ?? '',
                        $row->mat2 ?? '',
                        $row->as2 ?? '',
                        $row->mat3 ?? '',
                        $row->as3 ?? '',
                        $row->pisau ?? '',
                        $row->citto ?? '',
                        $row->emboss ?? '',
                        $row->hotprint ?? '',
                        $row->note1 ?? '',
                    ]);
                }

                fclose($handle);
            });
            $response->headers->set('Content-Type', 'text/csv');
            $response->headers->set('Content-Disposition', 'attachment; filename="' . $fileName . '"');
            return $response;
    }
}

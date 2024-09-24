<?php

namespace App\Http\Controllers\Finance\Kadept;

use App\Http\Controllers\Controller;
use App\Models\Prodev;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class FinanceJobKadeptController extends Controller
{
    public function index (Request $request){
        $joblist = Prodev::where('statusjob', 'Approve')->get();
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
        return view('role.finance.kadept.job.listjob', compact('job','joblist'));
    }

        public function downloadTable(){
                $response = new StreamedResponse(function() {
                $handle = fopen('php://output', 'w');
                // Tambahkan header CSV
                fputcsv($handle, [
                    'JOB',
                    'SC',
                    'TANGGAL SC',
                    'EDIT SC',
                    'NOTESC',
                    'TANGGALJOB',
                    'EDIT JOB',
                    'STATUSJOB',
                    'STATUSPRODUCT',
                    'PRODUCT',
                    'PO',
                    'TANGGALPO',
                    'SAP',
                    'SCODE',
                    'CUSTOMER',
                    'CLIENT',
                    'PLANT',
                    'ADDRESS',
                    'ETAUSER',
                    'MATERIAL',
                    'SIZE',
                    'SPECS',
                    'FINISHINGSC',
                    'QTY',
                    'UNIT',
                    'PRICE',
                    'TOLERANSI',
                    'ORIGINALSAMPLE',
                    'DESIGNBENTUK',
                    'TGLTERIMA',
                    'DOCKET',
                    'STATUSDOCKET',
                    'ACTCOLOR',
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
                    'FINISHINGJOB',
                    'ACUANWARNA',
                    'PACKING',
                    'NOPS',
                    'BOXNAME',
                    'BOXSIZE',
                    'BOXSPECS',
                    'NWBOX',
                    'APPLICATION',
                    'LAYOUT',
                    'NAMALAYOUT',
                    'UP',
                    'UKPRESSLAYOUT',
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
                    'NOTEDESIGNREQ',
                    'NOTEDJOB',
                ]);

                // Ambil data dari database dan tulis ke CSV
                $rows = Prodev::all();
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->id ?? '',
                        $row->nosc?? '',
                        $row->createdsc ?? '',
                        $row->updatedsc ?? '',
                        $row->notesc ?? '',
                        $row->created_at ?? '',
                        $row->updated_at ?? '',
                        $row->statusjob ?? '',
                        $row->status ?? '',
                        $row->product ?? '',
                        $row->po ?? '',
                        $row->tanggalpo ?? '',
                        $row->sap ?? '',
                        $row->scode ?? '',
                        $row->customer ?? '',
                        $row->client ?? '',
                        $row->plantcode ?? '',
                        $row->address ?? '',
                        $row->etauser ?? '',
                        $row->material ?? '',
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
                        $row->boxname ?? '',
                        $row->boxspecs ?? '',
                        $row->boxsize ?? '',
                        $row->nwbox ?? '',
                        $row->aplikasi ?? '',
                        $row->layout ?? '',
                        $row->namalayout ?? '',
                        $row->ukpresslayout ?? '',
                        $row->up ?? '',
                        $row->mat1 ?? '',
                        $row->mat2 ?? '',
                        $row->mat3 ?? '',
                        $row->as1 ?? '',
                        $row->as2 ?? '',
                        $row->as3 ?? '',
                        $row->pisau ?? '',
                        $row->citto ?? '',
                        $row->emboss ?? '',
                        $row->hotprint ?? '',
                        $row->note2 ?? '',
                        $row->note1 ?? '',
                    ]);
                }
                fclose($handle);
            });
            $response->headers->set('Content-Type', 'text/csv');
            $response->headers->set('Content-Disposition', 'attachment; filename="DatabaseJOB.csv"');
            return $response;
    }
   
}

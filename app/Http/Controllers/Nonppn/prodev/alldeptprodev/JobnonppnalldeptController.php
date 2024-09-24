<?php

namespace App\Http\Controllers\Nonppn\prodev\alldeptprodev;

use App\Http\Controllers\Controller;
use App\Models\Prodevnonppn;
use Illuminate\Http\Request;

class JobnonppnalldeptController extends Controller
{
    public function index(Request $request)
        {
            $query = Prodevnonppn::query();
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
                $query->orderByDesc('id');
            } elseif ($sortBy == 'asc') {
                $query->orderBy('id');
            } elseif ($sortBy == 'desc') {
                $query->orderByDesc('id');
            }elseif ($sortBy == 'asccreated') {
                $query->orderBy('created_at');
            } elseif ($sortBy == 'desccreated') {
                $query->orderByDesc('created_at');
            }elseif ($sortBy == 'ascupdated') {
                $query->orderBy('updated_at');
            } elseif ($sortBy == 'descupdated') {
                $query->orderByDesc('updated_at');
            }
            // Ambil data berdasarkan query yang telah dibuat
            $job = $query->paginate(10);

            return view('role.nonppn.prodev.prodevalldept.job.listjob', compact('job'));
        }
}

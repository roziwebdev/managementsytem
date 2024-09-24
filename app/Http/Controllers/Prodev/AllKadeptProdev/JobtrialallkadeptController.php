<?php

namespace App\Http\Controllers\Prodev\AllKadeptProdev;

use App\Http\Controllers\Controller;
use App\Models\Prodevtrial;
use Illuminate\Http\Request;

class JobtrialallkadeptController extends Controller
{
    public function index(Request $request)
    {
        $query = Prodevtrial::query();
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

        return view('role.prodev.prodevallkadept.jobtrial.listjob', compact('job'));
    }
}

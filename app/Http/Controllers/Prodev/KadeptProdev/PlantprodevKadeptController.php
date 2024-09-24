<?php

namespace App\Http\Controllers\Prodev\KadeptProdev;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use Illuminate\Http\Request;

class PlantprodevKadeptController extends Controller
{
    public function index(Request $request)
    {
        $query = Plant::query();

        if ($request->has('search')) {
        $searchValue = $request->input('search');

            $query->where(function ($q) use ($searchValue) {
                $q->where('id', $searchValue)
                    ->orWhere('plant', 'like', '%' . $searchValue . '%')
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
    } elseif ($sortBy == 'ascplant') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan product secara ascending
        $query->orderBy('plant');
    } elseif ($sortBy == 'descplant') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan product secara descending
        $query->orderByDesc('plant');
    } elseif ($sortBy == 'asccustomer') {
        // Jika ada query pencarian dan sort_by = asc, urutkan berdasarkan product secara ascending
        $query->orderBy('customer');
    } elseif ($sortBy == 'desccustomer') {
        // Jika ada query pencarian dan sort_by = desc, urutkan berdasarkan product secara descending
        $query->orderByDesc('customer');
    }

    // Ambil data berdasarkan query yang telah dibuat
        $plant = $query->paginate(15);
        return view('role.prodev.prodevkadept.plant.listplant', compact('plant'));
    }
}

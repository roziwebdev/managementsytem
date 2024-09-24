<?php

namespace App\Http\Controllers\Prodev\AllKadeptProdev;

use App\Http\Controllers\Controller;
use App\Models\Packaging;
use Illuminate\Http\Request;

class PackagingallkadeptController extends Controller
{
    public function index(Request $request)
    {
        $query = Packaging::query();

        if($request->has('search')) {
            $searchValue = $request->input('search');
            $query->where(function ($q) use ($searchValue) {
                $q->where('pn', 'like', '%' . $searchValue . '%')
                    ->orWhere('product', 'like', '%' . $searchValue . '%')
                    ->orWhere('designno', 'like', '%' . $searchValue . '%')
                    ->orWhere('boxname', 'like', '%' . $searchValue . '%');
            });
        }

         $query->orderBy('id', 'desc');

        $packagings = $query->paginate(20);


        return view('role.prodev.prodevallkadept.packaging.listpackaging', compact('packagings'));
    }
}

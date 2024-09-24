<?php

namespace App\Http\Controllers\Sales\AllDeptSales;

use App\Http\Controllers\Controller;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesalldeptController extends Controller
{
    public function index(Request $request)
    {
        $query = Sales::query();

            if ($request->has('search')) {
            $searchValue = $request->input('search');
                $query->where(function ($q) use ($searchValue) {
                    $q->where('id', $searchValue)
                        ->orWhere('product', 'like', '%' . $searchValue . '%')
                        ->orWhere('customer', 'like', '%' . $searchValue . '%');
            });
        }

        $salescontract = $query->orderBy('id', 'desc')->paginate(10);

        return view('role.sales.salesalldept.listsalesalldept',compact('salescontract'));
    }
}

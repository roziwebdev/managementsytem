<?php

namespace App\Http\Controllers\Sales\Manager;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationmgrController extends Controller
{
    public function index(){

        $query = Quotation::query();
        if(request()->has('search')) {
            $searchValue = request()->input('search');
            $query->where(function ($q) use ($searchValue) {
                $q->where('id', $searchValue)
                    ->orWhere('product', 'like', '%' . $searchValue . '%')
                    ->orWhere('customer', 'like', '%' . $searchValue . '%');
            });
        }

        $quotations = $query->paginate(10);
        return view('role.sales.salesmanager.quotation.listquotation',compact('quotations'));
    }

    public function show(Request $request, $id){
        $quotation = Quotation::find($id);
        return view('role.sales.salesmanager.quotation.show', compact('quotation'));
    }

    public function print(Request $request, $id){
        $quotation = Quotation::find($id);
        return view('role.sales.salesmanager.quotation.print', compact('quotation'));
    }
}

<?php

namespace App\Http\Controllers\Sales;

use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Productsales;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     
    public function getProductsByCustomerAndProduct(Request $request) 
    {
        $customerName = $request->input('customer');
        $productName = $request->input('product');
        $products = Productsales::where('customer', $customerName)
                                 ->where('product', 'like', '%' . $productName . '%')
                                 ->pluck('product')
                                 ->toArray();
        return response()->json($products);
    }
     
    public function index(Request $request)
    {
        $productsales = Productsales::all();
        $customers = Customer::all();
        $query = Quotation::query();
        if(request()->has('search')) {
            $searchValue = request()->input('search');
            $query->where(function ($q) use ($searchValue) {
                $q->where('id', $searchValue)
                    ->orWhere('product', 'like', '%' . $searchValue . '%')
                    ->orWhere('customer', 'like', '%' . $searchValue . '%');
            });
        }

        $quotations = $query->orderBy('id', 'desc')->paginate(10);
        return view('role.sales.salesdept.quotation.listquotation', compact('productsales','quotations', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }


    public function store(Request $request)
    {
        $quotation = new Quotation();
        $quotation->customer = $request->customer;
        $quotation->alamat = $request->alamat;
        $quotation->status =  $request->status;
        $quotation->product = json_encode($request->product);
        $quotation->material =  json_encode($request->material);
        $quotation->size =  json_encode($request->size);
        $quotation->specs =  json_encode($request->specs);
        $quotation->qty =  json_encode($request->qty);
        $quotation->unit =  json_encode($request->unit);
        $quotation->price =  json_encode($request->price);
        $quotation->seller =  json_encode($request->seller);
        $quotation->statusitem =  json_encode($request->statusitem);
        $quotation->noteitem =  json_encode($request->noteitem);
        $quotation->finalqty =  json_encode($request->finalqty);
        $quotation->finalprice =  json_encode($request->finalprice);
        $quotation->qtyfinalnego =  json_encode($request->qtyfinalnego);
        $quotation->pricefinalnego =  json_encode($request->pricefinalnego);
        $quotation->po =  json_encode($request->po);
        $quotation->save();
        return redirect()->route('quotation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $quotation = Quotation::find($id);
        return view('role.sales.salesdept.quotation.show', compact('quotation'));
    }

    public function print($id)
    {
        $quotation = Quotation::find($id);
        return view('role.sales.salesdept.quotation.print', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $quotation = Quotation::find($id);
        return view('role.sales.salesdept.quotation.edit', compact('quotation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $quotation = Quotation::find($id);
        $quotation->status =  $request->status;
        $quotation->product = json_encode($request->product);
        $quotation->material =  json_encode($request->material);
        $quotation->size =  json_encode($request->size);
        $quotation->specs =  json_encode($request->specs);
        $quotation->qty =  json_encode($request->qty);
        $quotation->unit =  json_encode($request->unit);
        $quotation->price =  json_encode($request->price);
        $quotation->statusitem =  json_encode($request->statusitem);
        $quotation->noteitem =  json_encode($request->noteitem);
        $quotation->finalqty =  json_encode($request->finalqty);
        $quotation->finalprice =  json_encode($request->finalprice);
        $quotation->qtyfinalnego =  json_encode($request->qtyfinalnego);
        $quotation->pricefinalnego =  json_encode($request->pricefinalnego);
        $quotation->po =  json_encode($request->po);
        
        $quotation->save();
        return redirect()->route('quotation.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $quotation = Quotation::find($id);
        $quotation->delete();
        return redirect()->route('quotation.index');
    }

    public function updateStatus(Request $request, $id)
    {
        $newStatus = $request->input('newStatus');
        $quotation = Quotation::find($id);
        $quotation->status = $newStatus;
        $quotation->save();
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }

    public function getProduct($product)
    {
        $product = Productsales::where('product', $product)->first();
        if ($product) {
            return response()->json(['material' => $product->material, 'specs' => $product->specs, 'size' => $product->size]);
        } else {
            return response()->json(['error' => 'Data Product tidak ditemukan.'], 404);
        }
    }
}

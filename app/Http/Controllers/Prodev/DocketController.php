<?php

namespace App\Http\Controllers\Prodev;

use App\Http\Controllers\Controller;
use App\Models\Docket;
use Illuminate\Http\Request;

class DocketController extends Controller
{
    public function index(Request $request){
        $query = Docket::query();
        if($request->has('search')) {
            $searchValue = $request->input('search');
            $query->where(function ($q) use ($searchValue) {
                $q->where('product', 'like', '%' . $searchValue . '%')
                    ->orWhere('nodocket', 'like', '%' . $searchValue . '%');
            });
        }
        $dockets = $query->orderBy('id', 'desc')->paginate(20);
        return view('role.prodev.prodevdept.docket.listdocket', compact('dockets'));
    }

    public function store(Request $request){
        $docket = new Docket;
        $docket->product = $request->product;
        $docket->nodocket = $request->nodocket;
        $docket->prepress = $request->prepress;
        $docket->tglefektif = $request->tglefektif;
        $docket->duedate = $request->duedate;
        $docket->productsize = $request->productsize;
        $docket->diecutsize = $request->diecutsize;
        $docket->remarks = $request->remarks;
        $docket->save();
        return redirect()->back();
    }

    public function edit($id){
        $docket = Docket::find($id);
        return view('', compact('docket'));
    }

    public function update(Request $request, $id){
        $docket = Docket::find($id);
        $docket->product = $request->product;
        $docket->nodocket = $request->nodocket;
        $docket->prepress = $request->prepress;
        $docket->tglefektif = $request->tglefektif;
        $docket->duedate = $request->duedate;
        $docket->productsize = $request->productsize;
        $docket->diecutsize = $request->diecutsize;
        $docket->remarks = $request->remarks;
        $docket->save();
        return redirect()->back();
    }

   

    public function destroy($id){
        $docket = Docket::find($id);
        $docket->delete();
        return redirect()->back();
    }
}

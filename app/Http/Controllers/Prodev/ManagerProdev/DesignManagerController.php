<?php

namespace App\Http\Controllers\Prodev\ManagerProdev;

use App\Http\Controllers\Controller;
use App\Models\Designnumber;
use Illuminate\Http\Request;

class DesignManagerController extends Controller
{
    public function index(Request $request){

        $query = Designnumber::query();

        if($request->has('search')) {
            $searchValue = $request->input('search');
            $query->where(function ($q) use ($searchValue) {
                $q->where('designno', 'like', '%' . $searchValue . '%')
                    ->orWhere('product', 'like', '%' . $searchValue . '%');
            });
        }
        $designs = $query->paginate(20);

        return view('role.prodev.prodevmanager.design.listdesign', compact("designs"));
    }

}

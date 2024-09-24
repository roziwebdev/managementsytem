<?php

namespace App\Http\Controllers\Prodev\ManagerProdev;

use App\Http\Controllers\Controller;
use App\Models\Docketnew;
use Illuminate\Http\Request;

class DocketnewManagerController extends Controller
{

        public function index(Request $request){
        $query = Docketnew::query();

        if($request->has('search')) {
            $searchValue = $request->input('search');
            $query->where(function ($q) use ($searchValue) {
                $q->where('designno', 'like', '%' . $searchValue . '%')
                    ->orWhere('product', 'like', '%' . $searchValue . '%');
            });
        }
        $designs = $query->paginate(20);

        return view('role.prodev.prodevmanager.docketnew.listdocketnew', compact("designs"));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function form()
    {
        return view('role.purchasing.createpo');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = DB::table('purchasings')
            ->where('po', 'like', '%' . $keyword . '%')
            ->paginate(10);

        return view('role.purchasing.formpo', compact('results'));
    }
}

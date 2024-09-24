<?php

namespace App\Http\Controllers;

use App\Models\Nama;
use Illuminate\Http\Request;

class NamaController extends Controller
{
    public function index()
    {
        $namas = Nama::all();
        return view('list_nama', compact('namas'));
    }
}

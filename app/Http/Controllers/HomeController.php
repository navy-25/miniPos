<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getKategori()
    {
        $data = \App\Models\MasterKategori::all();
        return response()->json($data);
    }
    public function getSupplier()
    {
        $data = \App\Models\MasterSupplier::all();
        return response()->json($data);
    }
}

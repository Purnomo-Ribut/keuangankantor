<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\tbl_divisi;
use App\tbl_kategori;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dataDivisi = tbl_divisi::all()->count();
        $dataKategori = tbl_kategori::all()->count();
        return view('dashboard', compact('dataDivisi', 'dataKategori'));
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devices;

class Grafik3Controller extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lampu3=Devices::where('nama','lampu3')->first();
        $node3=Devices::where('nama','node3')->first();
        return view('panel3')->with(compact('lampu3','node3'));

        
    }
    public function controll()
    {
        return view('controll');
    }
}

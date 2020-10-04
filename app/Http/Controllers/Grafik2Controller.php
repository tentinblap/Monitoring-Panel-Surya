<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devices;

class Grafik2Controller extends Controller
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
        $lampu2=Devices::where('nama','lampu2')->first();
        $node2=Devices::where('nama','node2')->first();
        return view('panel2')->with(compact('lampu2','node2'));

        
    }
    public function controll()
    {
        return view('controll');
    }
}

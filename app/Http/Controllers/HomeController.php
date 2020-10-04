<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devices;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lampu=Devices::where('nama','lampu')->first();
        $node=Devices::where('nama','node')->first();
        $node2=Devices::where('nama','node2')->first();
        $node3=Devices::where('nama','node3')->first();
        return view('home')->with(compact('lampu','node','node2','node3'));

        
    }
    public function controll()
    {
        return view('controll');
    }
}

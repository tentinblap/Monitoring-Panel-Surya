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
        return view('home')->with(compact('lampu','node'));

        
    }
    public function controll()
    {
        return view('controll');
    }
}

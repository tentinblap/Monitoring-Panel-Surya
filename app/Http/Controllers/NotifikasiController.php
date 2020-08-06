<?php

namespace App\Http\Controllers;

use App\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifikasi = Notifikasi::where('status','0')->get();
        if($notifikasi->count()>0){
            $response = [
                'msg' => 'Success',
                'notifikasi' => $notifikasi
            ];
        }
        else{
            $response = [
                'msg' => 'Success',
                'notifikasi' =>[]
            ];
        }
        return response()->json($notifikasi,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notifikasi= new Notifikasi;
        $notifikasi->keterangan= $request->input("node")." No Voltage Detected";
        $notifikasi->status=0;
        $notifikasi->save();

        $response = [
            'msg' => 'Success',
            'notifikasi' => $notifikasi
        ];
        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Notifikasi $notifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $notifikasi=Notifikasi::where('status',0)->get();
        foreach ($notifikasi as $notif) {
            $notif->status=1;
            $notif->save();
        }
    

        $response = [
            'msg' => 'Success',
            'notifikasi' => $notifikasi
        ];
        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notifikasi  $notifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notifikasi $notifikasi)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;
use App\Models\pemesanan;
use App\Models\room;

class clientController extends Controller
{
    public function index()
    {
        $pemesanan = pemesanan::all();
        return view('resepsionis.client', compact('pemesanan'));
    }
    public function status(Request $request)
    {
        pemesanan::where('id', $request->id)->update([
            'status' => $request->status
        ]);

        if($request->status == 'ditempati' || $request->status == 'diproses'){
            room::where('id', $request->id_kamar)->update([
                'status' => 1
            ]);
        }else{
            room::where('id', $request->id_kamar)->update([
                'status' => 0
            ]);
        }
        
        return redirect('resepsionis/client')->with('success', 'Reservasi berhasil di proses');
    }
}

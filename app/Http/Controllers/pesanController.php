<?php

namespace App\Http\Controllers;

use App\Models\client;
use App\Models\pemesanan;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class pesanController extends Controller
{
    public function detail(Request $request)
    {
        $req = $request->all();
        return view('kamar', compact('req'));
    }
    public function pesan(Request $request)
    {
        $request->validate([
            'mulai' => 'required',
            'selesai' => 'required',
            'nama' => 'required',
            'no' => 'required',
            'email' => 'required',
        ]);

        $mulai = Carbon::parse($request->mulai);
        $selesai = Carbon::parse($request->selesai);
        $interval = $mulai->diffInDays($selesai);
        $uuid = Str::uuid();
        $hargaSemuaKamar = 0;

        foreach($request->id_kamar as $id){
            $hargakamar = room::find($id)->harga;
            $hargaTotal = $interval * $hargakamar;
            $hargaSemuaKamar += $hargaTotal;
        }
        $client = client::insertGetId([
            'nama' => $request->nama,
            'no' => $request->no,
            'email' => $request->email,
        ]);
        foreach ($request->id_kamar as $id_kamar) {
            pemesanan::insert([
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'id_client' => $client,
                'id_room' => $id_kamar,
                'hargatotal'=> $hargaSemuaKamar,
                'token' => $uuid,
                'status' => 'diproses',
            ]);
            room::where('id',$id_kamar)->update([
                'status' => '1',
            ]);
        }
        return redirect('kamar/'.$uuid.'/reserve/kwitansi')->with('success','Pemesanan Berhasil');
    }
    public function kwitansi($token)
    {
        $reserved = pemesanan::where('token', $token)->get();
        $jumlahkamar = sizeof($reserved);
        return view('kwitansi', compact('reserved','jumlahkamar'));
    }
}

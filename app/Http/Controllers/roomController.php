<?php

namespace App\Http\Controllers;

use App\Models\room;
use App\Models\jenis;
use App\Models\fasilitas;
use Illuminate\Http\Request;

class roomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function client()
    {
        $room = room::all();
        $fasilitas = fasilitas::all();
        $jenis = jenis::all();
        return view('dashboard' , compact('room', 'jenis','fasilitas') );
    }
    public function index()
    {
        $room = room::all();
        $fasilitas = fasilitas::all();
        $jenis = jenis::all();
        return view('admin.dashboard' , compact('room','jenis','fasilitas'));
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
        $request->validate([
            'no' => 'required',
            'jenis' => 'required',
            'bed' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar' => 'required'
        ]);
        
        $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('image/kamar'), $imageName);
        room::create([
            'no' => $request->no,
            'id_jenis' => $request->jenis,
            'bed' => $request->bed,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $imageName,
            'status' => 0
        ]);
        return redirect('/admin/dashboard')->with('addSuccess', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('/admin/edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no' => 'required',
            'jenis' => 'required',
            'bed' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        if($request->hasFile('gambar')){
            $image = $request->file('gambar');
            $imageName = time(). '_' . $image->getClientOriginalName();
            $image->move(public_path('image/kamar'),$imageName);
        
            $image_path = "image/kamar" . $imageName;
        } else {
            $imageName = $request->gambarLama;
        }
        room::where('id', $id)->update([
            'no' => $request->no,
            'id_jenis' => $request->jenis,
            'bed' => $request->bed,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'gambar' => $imageName
        ]);
        return redirect('/admin/dashboard')->with('updateSuccess', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        room::destroy($id);
        return redirect('/admin/dashboard')->with('deleteSuccess', 'Data Berhasil Dihapus');
    }
    public function jenis($id)
    {
        $jenis = jenis::all();
        $room = room::where('id_jenis', $id)->get();
        $fasilitas = fasilitas::all();
        return view('tipe', compact('jenis','room','id','fasilitas'))->with('success', 'Silahkan Pilih kamar');
    }
}

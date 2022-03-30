<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasilitas;

class fasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = fasilitas::all();
        return view('admin.fasilitas' , compact('fasilitas'));
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ]);

        $imageName = time() . '_' . $request->file('gambar')->getClientOriginalName();

        $request->gambar->move(public_path('image/fasilitas'), $imageName);
        fasilitas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);
        return redirect('/admin/fasilitas')->with('addSuccess', 'Data Berhasil Ditambahkan');
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
    public function edit(fasilitas $fasilitas)
    {
        return view('/admin/editfasi', compact('fasilitas'));   
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
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        if($request->hasFile('gambar')){
            $image = $request->file('gambar');
            $imageName = time(). '_' . $image->getClientOriginalName();
            $image->move(public_path('image/fasilitas'),$imageName);
        
            $image_path = "image/fasilitas" . $imageName;
        } else {
            $imageName = $request->gambarLama;
        }
        fasilitas::where('id', $id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);
        return redirect('/admin/fasilitas')->with('updateSuccess', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        fasilitas::destroy($id);
        return redirect('/admin/fasilitas')->with('deleteSuccess', 'Data Berhasil Dihapus');
    }
}

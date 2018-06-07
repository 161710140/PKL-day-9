<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel= Artikel::with('Kategori')->get();
        return view('Artikel.index',compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('Artikel.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Judul' => 'required|',
            'content' => 'required|',
            'kategori_id'=>'required'
            ]);
            $artikel = new Artikel;
            $artikel->Judul = $request->Judul;
            $artikel->content = $request->content;
            $artikel->kategori_id= $request->kategori_id;
            $artikel->save();
            
            return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrfail($id);
        $kategori = Kategori::all();
        $selectedkategori = Artikel::findOrfail($id)->kategori_id;
        return view('Artikel.edit',compact('artikel','kategori','selectedkategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'Judul' => 'required|',
            'content' => 'required',
            'kategori_id' => 'required'
        ]);
       $artikel =Artikel::findOrFail($id);
       $artikel->Judul = $request->Judul;
       $artikel->content = $request->content;
       $artikel->kategori_id = $request->kategori_id;
       $artikel->save();
       return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrfail($id);
        $artikel->delete();
        return redirect()->route('artikel.index');
    }
}

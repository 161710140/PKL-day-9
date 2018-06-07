<?php

namespace App\Http\Controllers;

use App\Panduan;
use Illuminate\Http\Request;

class PanduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $panduan= Panduan::all();
        return view('Panduan.index',compact('panduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Panduan.create');
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
            'judul' => 'required',
            'deskripsi' =>'required'
            ]);
            $panduan = new Panduan;
            $panduan->judul = $request->judul;
            $panduan->deskripsi = $request->deskripsi;
            $panduan->save();
            
            return redirect()->route('panduan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Panduan  $panduan
     * @return \Illuminate\Http\Response
     */
    public function show(Panduan $panduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Panduan  $panduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Panduan $panduan)
    {
        return view('Panduan.edit',compact('panduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Panduan  $panduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panduan $panduan)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' =>'required'
            ]);
            $panduan = Panduan::findOrfail($panduan->id);
            $panduan->judul = $request->judul;
            $panduan->deskripsi = $request->deskripsi;
            $panduan->save();
            return redirect()->route('panduan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Panduan  $panduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panduan $panduan)
    {
        $panduan->delete();
        return redirect()->route('panduan.index');
    }
}

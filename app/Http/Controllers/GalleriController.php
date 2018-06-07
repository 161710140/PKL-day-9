<?php

namespace App\Http\Controllers;

use App\Galleri;
use File;
use Illuminate\Http\Request;

class GalleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleri= Galleri::all();
        return view('Gallery.index',compact('galleri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Gallery.create');
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
            'nama' => 'required',
            'file_gambar' =>'required'
            ]);

        $galleri = new Galleri;
        $galleri->nama = $request->nama;
        $galleri->file_gambar =$request->file_gambar;

        if($request->hasfile('file_gambar')){
            $file = $request->file('file_gambar');
            $destinationPath = public_path() .DIRECTORY_SEPARATOR. 'img';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath,$filename);
            $galleri->file_gambar = $filename;
        }
        $galleri->save();
        return redirect()->route('galleri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function show(Galleri $galleri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function edit(Galleri $galleri)
    {
        return view('Gallery.edit',compact('galleri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galleri $galleri)
    {

        $this->validate($request,[
            'nama' => 'required|',
            'file_gambar' => 'required|'
        ]);
       $galleri = Galleri::findOrFail($galleri->id);
       $galleri->nama = $request->nama;

       if($request->hasFile('file_gambar')){
           $file = $request->file('file_gambar');
           $destinationPath = public_path().DIRECTORY_SEPARATOR.'img';
           $filename = str_random(6).'_'.$file->getClientOriginalName();
           $uploadSuccess = $file->move($destinationPath,$filename);
       

        if($galleri->file_gambar) {
            $old_foto = $galleri->file_gambar;
            $filepath = public_path() .DIRECTORY_SEPARATOR.'/img'
            . DIRECTORY_SEPARATOR . $galleri->file_gambar;
            try {
                File::delete($filepath);
            } catch(FileNotFoundException $e) {

            }
        }
        $galleri->file_gambar = $filename;
    }
    $galleri->save();
        return redirect()->route('galleri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galleri  $galleri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galleri $galleri)
    {
        $galleri = Galleri::findOrfail($galleri->id);
        

        if($galleri->file_gambar){
            $old_foto = $galleri->file_gambar;
            $filepath = public_path() .DIRECTORY_SEPARATOR.'img'
            . DIRECTORY_SEPARATOR . $galleri->file_gambar;

            try{
                File::delete($filepath);
            } catch (FileNotFoundException $e) {

            }
        }
        $galleri->delete();

        return redirect()->route('galleri.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wisata;
use Illuminate\Support\Facades\Storage;
class WisatasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisatas = wisata::all();
        return view('wisatas.index',['wisatas'=>$wisatas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wisatas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'kota' => 'required|min:5',
            'harga_tiket' => 'required|min:5',
            'deskripsi' => 'required|min:5',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);
        $image = $request->file('image');
        $image->storeAs('public/images', $image->hashName());
        wisata::create([
            'image' => $image->hashName(),
            'nama' => $request->nama,
            'kota' => $request->kota,
            'harga_tiket' => $request->harga_tiket,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('wisatas.index')->with('success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(wisata$wisata)
    {
        return view('wisatas.show',['wisatas'=>$wisata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(wisata$wisata)
    {
        return view('wisatas.edit',['wisata'=>$wisata]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wisata$wisata)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'kota' => 'required|min:5',
            'harga_tiket' => 'required|min:5',
            'deskripsi' => 'required|min:5',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048'
        ]);
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/images', $image->hashName());

            Storage::delete('public/images/' .$wisata->image);

        $wisata->update([
            'image' => $image->hashName(),
            'nama' => $request->nama,
            'kota' => $request->kota,
            'harga_tiket' => $request->harga_tiket,
            'deskripsi' => $request->deskripsi,
        ]);
    }else{
        ([
            'nama' => $request->nama,
            'kota' => $request->kota,
            'harga_tiket' => $request->harga_tiket,
            'deskripsi' => $request->deskripsi,
        ]);
     
    }
    return redirect()->route('wisatas.index')->with('success', 'Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(wisata$wisata)
    {
        $wisata->delete();
        return redirect()->route('wisatas.index')->with('Success', 'Deleted Successfully');
    }
}

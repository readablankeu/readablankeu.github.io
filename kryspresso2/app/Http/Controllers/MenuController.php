<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index()
    {
        $menu = Menu::latest()->get();
        return view('menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = $request->gambar->store('gambar','public');
        $menu = Menu::create([
            'category_produk'=>$request->input('category_produk'),
            'jenis_produk'=>$request->input('jenis_produk'),
            'nama_produk'=>$request->input('nama_produk'),
            'bahan_produk'=>$request->input('bahan_produk'),
            'deskripsi_produk'=>$request->input('deskripsi_produk'),
            'harga_produk'=>$request->input('harga_produk'),
            'stok_produk'=>$request->input('stok_produk'),
            'gambar'=>$gambar,
            // 'gambar'=>$request->input('gambar'),
        ]);
        return redirect('/menu')->with('success','Menu telah disimpan!');
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
    public function edit(Menu $menu)
    {
        return view('menu.edit',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $menu = Menu::whereId($menu->id)->update([
            'jenis_produk'=>$request->input('jenis_produk'),
            'nama_produk'=>$request->input('nama_produk'),
            'bahan_produk'=>$request->input('bahan_produk'),
            'deskripsi_produk'=>$request->input('deskripsi_produk'),
            'harga_produk'=>$request->input('harga_produk'),
            'stok_produk'=>$request->input('stok_produk'),
            // 'gambar'=>$request->input('gambar'),
        ]);
        return redirect('/menu')->with('success','Menu telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu = Menu::find($menu->id);
        $menu->delete();
        return redirect('/menu')->with('success','Menu telah dihapus!');
    }
}

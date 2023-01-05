<?php

namespace App\Http\Controllers;


use App\Models\Kupon;
use App\Models\Jenisproduk;
use Illuminate\Http\Request;

class KuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kupon = Kupon::latest()->get();
        $jenisproduks = Jenisproduk::latest()->get();
        return view('kupon.index', compact('kupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenisproduks = Jenisproduk::get();
        return view('kupon.create',compact('jenisproduks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kupon = Kupon::create([
            'nama_kupon' => $request-> input('nama_kupon'),
            'jenisproduk_id' => $request-> input('jenisproduk_id'),
            // 'nama_produk' => $request-> input('nama_produk'),
            'expired_kupon' => $request->input('expired_kupon'),
            'deskripsi_kupon' => $request-> input('deskripsi_kupon'),
            'status'=> $request->input('status')
        ]);
        //return $request;
        return redirect('/kupon')->with('success','Kupon telah di simpan!');
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
    public function edit(Kupon $kupon)
    {
        $jenisproduks = Jenisproduk::get();
        return view('kupon.edit', compact('kupon','jenisproduks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kupon $kupon)
    {
        $kupon = Kupon::whereId($kupon->id)->update([
            'nama_kupon' => $request-> input('nama_kupon'),
            'jenisproduk_id' => $request-> input('jenisproduk_id'),
            // 'nama_produk' => $request-> input('nama_produk'),
            'expired_kupon' => $request->input('expired_kupon'),
            'deskripsi_kupon' => $request-> input('deskripsi_kupon'),
            'status' => $request-> input('status')
        ]);
        return redirect('/kupon')->with('success','Kupon berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kupon $kupon)
    {
        $kupon = Kupon::find($kupon->id);
        $kupon->delete();
        return redirect('/kupon')->with('success','Kupon telah dihapus!');
    }
}

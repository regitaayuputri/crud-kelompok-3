<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index',compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|
            string|max:225|unique:barangs,kode_barang',
            'nama_barang' => 'required|
            string|max:225',
            'kategori' => 'required|
            string|max:225',
            'lokasi' => 'required|
            string|max:225',
            'jumlah' => 'integer|
            string|min:0',
            'kondisi' => 'required|
            string|max:225',
            'keterangan' => 'nullabel|
            string',
        ]);
        Barang::create($request->all());
        return
        redirect()->route('barang.index')
             ->with('succes','Data barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang  $barang)
    {
        return view('barang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
         $request->validate([
            'kode_barang' => 'required| unique:barangs,kode_barang,' .$barang->id,
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'integer',
            'kondisi' => 'required',
            'keterangan' => 'nullabel',
        ]);
        $barang->update($request->all());
        return
        redirect()->route('barang.index')
                  ->with('succes','Data barang berhasil diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return
        redirect()->route('barang.index')
                  ->with('succes','Data barang berhasil dihapus.');
    }
}

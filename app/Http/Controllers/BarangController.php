<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::latest()->get();

        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:255|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Perlu Perbaikan,Rusak',
            'keterangan' => 'nullable|string',
        ]);

        Barang::create($validated);

        return redirect()->route('barangs.index')
            ->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit(Barang $barang)
    {
        return view('barangs.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kode_barang' => [
                'required',
                'string',
                'max:255',
                Rule::unique('barangs', 'kode_barang')
                    ->ignore($barang->id),
            ],
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Perlu Perbaikan,Rusak',
            'keterangan' => 'nullable|string',
        ]);

        $barang->update($validated);

        return redirect()->route('barangs.index')
            ->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barangs.index')
            ->with('success', 'Barang berhasil dihapus!');
    }
}

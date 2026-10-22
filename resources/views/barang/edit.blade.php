@extends('layouts')

@section('title', 'Edit Barang')

@section('content')
<div class="card">
    <h2>Edit Barang Laboratorium</h2>

    @if ($errors->any())
        <div class="error">
            <p>Periksa kembali data yang dimasukkan:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barangs.update', $barang) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="kode_barang">Kode Barang</label>
        <input id="kode_barang" name="kode_barang"
               value="{{ old('kode_barang', $barang->kode_barang) }}" required>

        <label for="nama_barang">Nama Barang</label>
        <input id="nama_barang" name="nama_barang"
               value="{{ old('nama_barang', $barang->nama_barang) }}" required>

        <label for="kategori">Kategori</label>
        <select id="kategori" name="kategori" required>
            @foreach (['Alat Ukur', 'Alat Optik', 'Alat Gelas', 'Alat Keselamatan', 'Lainnya'] as $kategori)
                <option value="{{ $kategori }}"
                    @selected(old('kategori', $barang->kategori) == $kategori)>
                    {{ $kategori }}
                </option>
            @endforeach
        </select>

        <label for="lokasi">Lokasi Penyimpanan</label>
        <input id="lokasi" name="lokasi"
               value="{{ old('lokasi', $barang->lokasi) }}" required>

        <label for="jumlah">Jumlah Barang</label>
        <input id="jumlah" type="number" min="0" name="jumlah"
               value="{{ old('jumlah', $barang->jumlah) }}" required>

        <label for="kondisi">Kondisi Barang</label>
        <select id="kondisi" name="kondisi" required>
            @foreach (['Baik', 'Perlu Perbaikan', 'Rusak'] as $kondisi)
                <option value="{{ $kondisi }}"
                    @selected(old('kondisi', $barang->kondisi) == $kondisi)>
                    {{ $kondisi }}
                </option>
            @endforeach
        </select>

        <label for="keterangan">Keterangan (opsional)</label>
        <textarea id="keterangan" name="keterangan"
                  rows="3">{{ old('keterangan', $barang->keterangan) }}</textarea>

        <br><br>
        <button type="submit" class="btn primary">
            Simpan Perubahan
        </button>
        <a href="{{ route('barangs.index') }}" class="btn secondary">
            Batal
        </a>
    </form>
</div>
@endsection

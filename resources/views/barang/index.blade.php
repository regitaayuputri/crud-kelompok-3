@extends('layouts')

@section('title', 'Daftar Barang')

@section('content')
<div class="card">
    <h2>Daftar Barang Laboratorium</h2>
    <p>Kelola data inventaris laboratorium dengan mudah.</p>

    <a href="{{ route('barangs.create') }}" class="btn primary">
        + Tambah Barang
    </a>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($barangs as $barang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kategori }}</td>
                    <td>{{ $barang->lokasi }}</td>
                    <td>{{ $barang->jumlah }}</td>
                    <td>{{ $barang->kondisi }}</td>
                    <td>
                        <div class="actions">
                            <a
                                href="{{ route('barangs.edit', $barang) }}"
                                class="btn warning">
                                Edit
                            </a>

                            <form
                                action="{{ route('barangs.destroy', $barang) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">Belum ada data barang.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

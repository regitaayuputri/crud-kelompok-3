<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f2;
            margin: 0;
            padding: 30px;
            color: #34483c;
        }
        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px #0001;
        }
        h2 { color: #52745c; }
        .tambah {
            display: inline-block;
            background: #52745c;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 6px;
            margin-bottom: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dce5dd;
            padding: 10px;
            text-align: left;
        }
        th { background: #e1ebe2; }
        .edit { color: #2874a6; }
        .hapus {
            color: #c0392b;
            border: 0;
            background: none;
            cursor: pointer;
            font-size: 14px;
        }
        .sukses {
            background: #dff3e3;
            padding: 12px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Data Investaris Barang</h2>

    @if(session('success'))
        <div class="sukses">{{ session('success') }}</div>
    @endif

    <a href="{{ route('barang.create') }}" class="tambah">
        + Tambah Barang
    </a>

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
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($barangs as $barang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kategori }}</td>
                    <td>{{ $barang->lokasi }}</td>
                    <td>{{ $barang->jumlah }}</td>
                    <td>{{ $barang->kondisi }}</td>
                    <td>{{ $barang->keterangan }}</td>
                    <td>
                        <a class="edit"
                           href="{{ route('barang.edit', $barang->id) }}">
                            Edit
                        </a>

                        <form action="{{ route('barang.destroy', $barang->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="hapus" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Belum ada data barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>

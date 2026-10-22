<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f2;
            padding: 30px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
        }
        h2 { color: #52745c; }
        label {
            display: block;
            margin-top: 15px;
        }
        input, select, textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccd8ce;
            border-radius: 5px;
        }
        button, .kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background: #52745c;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .error { color: #c0392b; }
    </style>
</head>
<body>
<div class="container">
    <h2>Tambah Data Barang</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <label>Kode Barang</label>
        <input type="text" name="kode_barang"
               value="{{ old('kode_barang') }}" required>

        <label>Nama Barang</label>
        <input type="text" name="nama_barang"
               value="{{ old('nama_barang') }}" required>

        <label>Kategori</label>
        <input type="text" name="kategori"
               value="{{ old('kategori') }}" required>

        <label>Lokasi</label>
        <input type="text" name="lokasi"
               value="{{ old('lokasi') }}" required>

        <label>Jumlah</label>
        <input type="number" name="jumlah" min="0"
               value="{{ old('jumlah', 0) }}" required>

        <label>Kondisi</label>
        <select name="kondisi" required>
            <option value="">-- Pilih Kondisi --</option>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
        </select>

        <label>Keterangan</label>
        <textarea name="keterangan" rows="3">{{ old('keterangan') }}</textarea>

        <button type="submit">Simpan Barang</button>
        <a href="{{ route('barang.index') }}" class="kembali">Kembali</a>
    </form>
</div>
</body>
</html>

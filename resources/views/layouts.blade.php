<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Inventaris Laboratorium</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #0f766e;
            color: white;
            padding: 22px 5%;
        }

        header h2 { margin: 0 0 6px; }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 18px;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 16px;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000c;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 9px 13px;
            border: 0;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .primary { background: #0f766e; color: white; }
        .warning { background: #f59e0b; color: #111827; }
        .danger { background: #dc2626; color: white; }
        .secondary { background: #e2e8f0; color: #1e293b; }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        th { background: #f8fafc; }

        label {
            display: block;
            margin: 14px 0 6px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font: inherit;
        }

        .alert {
            padding: 12px;
            margin-bottom: 16px;
            border-radius: 6px;
            background: #d1fae5;
            color: #065f46;
        }

        .error { color: #dc2626; font-size: 14px; }
        .actions { display: flex; gap: 6px; align-items: center; }
        .actions form { margin: 0; }

        footer {
            text-align: center;
            padding: 20px;
            color: #64748b;
        }
    </style>
</head>
<body>
    <header>
        <h2>Inventaris Laboratorium</h2>
        <p>Sistem Informasi Pengelolaan Barang Laboratorium</p>
        <nav>
            <a href="{{ route('barangs.index') }}">Daftar Barang</a>
            <a href="{{ route('barangs.create') }}">Tambah Barang</a>
        </nav>
    </header>

    <main>
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    <footer>
        CRUD Inventaris Laboratorium &copy; {{ date('Y') }}
    </footer>
</body>
</html>

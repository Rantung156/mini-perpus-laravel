
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mini-Perpus</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        header {
            background: #1d4ed8;
            color: white;
            padding: 24px 6%;
        }

        header h1 {
            margin: 0 0 8px;
        }

        nav {
            background: white;
            padding: 16px 6%;
            box-shadow: 0 2px 5px #00000010;
        }

        nav a {
            color: #1d4ed8;
            text-decoration: none;
            font-weight: bold;
            margin-right: 25px;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #00000008;
        }

        .card p {
            color: #64748b;
            margin: 0 0 12px;
        }

        .card h2 {
            margin: 0;
            font-size: 30px;
            color: #1d4ed8;
        }

        .panel {
            background: white;
            padding: 24px;
            border-radius: 12px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 13px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #f8fafc;
        }

        .empty {
            color: #64748b;
            padding: 20px 0;
        }
    </style>
</head>

<body>

<header>
    <h1>Mini-Perpus</h1>
    <p>Sistem Manajemen Inventaris Buku</p>
</header>

<nav>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('categories.index') }}">Kategori</a>
    <a href="{{ route('books.index') }}">Buku</a>
</nav>

<main>
    <h2>Dashboard</h2>
    <p>Ringkasan data inventaris perpustakaan.</p>

    <div class="cards">
        <div class="card">
            <p>Total Buku</p>
            <h2>{{ $totalBooks }}</h2>
        </div>

        <div class="card">
            <p>Total Kategori</p>
            <h2>{{ $totalCategories }}</h2>
        </div>

        <div class="card">
            <p>Total Stok</p>
            <h2>{{ $totalStock }}</h2>
        </div>
    </div>

    <div class="panel">
        <h2>Buku Terbaru</h2>

        @if ($latestBooks->isEmpty())
            <p class="empty">Belum ada data buku. Silakan tambahkan buku terlebih dahulu.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($latestBooks as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</main>

</body>
</html>


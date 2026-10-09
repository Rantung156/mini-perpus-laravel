<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Buku - Mini Perpus</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            color: #333;
        }

        .navbar {
            background: #1e3a5f;
            color: white;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            color: #1e3a5f;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-info {
            background: #0891b2;
            color: white;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .alert {
            background: #d1fae5;
            color: #065f46;
            padding: 14px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .table-box {
            background: white;
            border-radius: 10px;
            overflow-x: auto;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #1e3a5f;
            color: white;
        }

        .actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }
    </style>
</head>

<body>

<nav class="navbar">

    <h2>📚 Mini Perpus</h2>


<div>
    <a href="{{ route('dashboard') }}">
        Dashboard
    </a>

    <a href="{{ route('categories.index') }}">
        Kategori
    </a>

    <a href="{{ route('books.index') }}">
        Buku
    </a>
</div>


</nav>

<div class="container">

    <div class="header">

        <div>
            <h1>Daftar Buku</h1>
            <p>Kelola inventaris buku perpustakaan.</p>
        </div>

        <a
            href="{{ route('books.create') }}"
            class="btn btn-primary"
        >
            + Tambah Buku
        </a>

    </div>

    @if(session('success'))

        <div class="alert">
            {{ session('success') }}
        </div>

    @endif

    <div class="table-box">

        @if($books->count() > 0)

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($books as $book)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $book->title }}
                            </td>

                            <td>
                                {{ $book->author }}
                            </td>

                            <td>
                                {{ $book->category->name }}
                            </td>

                            <td>
                                {{ $book->stock }}
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="{{ route('books.show', $book) }}"
                                        class="btn btn-info"
                                    >
                                        Detail
                                    </a>

                                    <a
                                        href="{{ route('books.edit', $book) }}"
                                        class="btn btn-warning"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('books.destroy', $book) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger"
                                        >
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="empty">

                <h3>Belum ada buku</h3>

                <p>
                    Silakan tambahkan buku pertama.
                </p>

                <a
                    href="{{ route('books.create') }}"
                    class="btn btn-primary"
                >
                    + Tambah Buku
                </a>

            </div>

        @endif

    </div>

</div>

</body>
</html>
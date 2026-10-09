<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Buku - Mini Perpus</title>

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
        }

        .navbar h2 {
            margin: 0;
        }

        .container {
            max-width: 650px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
            color: #1e3a5f;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            margin-top: 18px;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .error-box {
            background: #fee2e2;
            color: #991b1b;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .buttons {
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
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

        .btn-secondary {
            background: #6b7280;
            color: white;
        }
    </style>
</head>

<body>

<div class="navbar">
    <h2>📚 Mini Perpus</h2>
</div>

<div class="container">

    <div class="card">

        <h1>Tambah Buku</h1>

        <p>Masukkan data buku perpustakaan.</p>

        @if($errors->any())

            <div class="error-box">

                <strong>Terjadi kesalahan:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        <form action="{{ route('books.store') }}" method="POST">

            @csrf

            <label for="title">
                Judul Buku
            </label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                placeholder="Contoh: Belajar Laravel"
            >

            <label for="author">
                Penulis
            </label>

            <input
                type="text"
                id="author"
                name="author"
                value="{{ old('author') }}"
                placeholder="Contoh: Andi"
            >

            <label for="category_id">
                Kategori
            </label>

            <select name="category_id" id="category_id">

                <option value="">
                    -- Pilih Kategori --
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

            <label for="stock">
                Stok
            </label>

            <input
                type="number"
                id="stock"
                name="stock"
                value="{{ old('stock', 0) }}"
                min="0"
                placeholder="Contoh: 10"
            >

            <div class="buttons">

                <button type="submit" class="btn btn-primary">
                    Simpan Buku
                </button>

                <a
                    href="{{ route('books.index') }}"
                    class="btn btn-secondary"
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html> 
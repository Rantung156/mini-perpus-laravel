<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        .error {
            background: #ffe5e5;
            color: #b00020;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .buttons {
            margin-top: 25px;
        }

        button {
            background: #198754;
            color: white;
            border: none;
            padding: 11px 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        .back {
            background: #6c757d;
            color: white;
            padding: 11px 18px;
            border-radius: 6px;
            text-decoration: none;
            margin-left: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Buku</h1>

    @if ($errors->any())
        <div class="error">
            <strong>Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="title">Judul Buku</label>
        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title', $book->title) }}"
        >

        <label for="author">Penulis</label>
        <input
            type="text"
            id="author"
            name="author"
            value="{{ old('author', $book->author) }}"
        >

        <label for="category_id">Kategori</label>
        <select id="category_id" name="category_id">

            <option value="">-- Pilih Kategori --</option>

            @foreach ($categories as $category)
                <option
                    value="{{ $category->id }}"
                    {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}
                >
                    {{ $category->name }}
                </option>
            @endforeach

        </select>

        <label for="stock">Stok</label>
        <input
            type="number"
            id="stock"
            name="stock"
            min="0"
            value="{{ old('stock', $book->stock) }}"
        >

        <div class="buttons">
            <button type="submit">Simpan Perubahan</button>

            <a href="{{ route('books.index') }}" class="back">
                Kembali
            </a>
        </div>

    </form>

</div>

</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>

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

        .detail {
            margin-top: 20px;
        }

        .row {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .value {
            color: #222;
        }

        .category {
            display: inline-block;
            background: #e7f1ff;
            color: #0d6efd;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .buttons {
            margin-top: 25px;
        }

        .edit {
            background: #198754;
            color: white;
            padding: 11px 18px;
            border-radius: 6px;
            text-decoration: none;
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

    <h1>Detail Buku</h1>

    <div class="detail">

        <div class="row">
            <div class="label">Judul Buku</div>
            <div class="value">
                {{ $book->title }}
            </div>
        </div>

        <div class="row">
            <div class="label">Penulis</div>
            <div class="value">
                {{ $book->author }}
            </div>
        </div>

        <div class="row">
            <div class="label">Kategori</div>
            <div class="value">
                <span class="category">
                    {{ $book->category->name }}
                </span>
            </div>
        </div>

        <div class="row">
            <div class="label">Stok</div>
            <div class="value">
                {{ $book->stock }}
            </div>
        </div>

    </div>

    <div class="buttons">

        <a href="{{ route('books.edit', $book) }}" class="edit">
            Edit Buku
        </a>

        <a href="{{ route('books.index') }}" class="back">
            Kembali
        </a>

    </div>

</div>

</body>
</html>
```

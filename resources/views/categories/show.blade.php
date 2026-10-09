<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori - Mini Perpus</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;
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
            max-width: 800px;
            margin: 50px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .category-name {
            font-size: 28px;
            font-weight: bold;
            color: #1e3a5f;
        }

        .book {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        .book:last-child {
            border-bottom: none;
        }

        .book-title {
            font-weight: bold;
        }

        .book-info {
            color: #666;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 16px;
            background: #6b7280;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .empty {
            color: #777;
            padding: 15px 0;
        }
    </style>
</head>

<body>

<div class="navbar">
    <h2>📚 Mini Perpus</h2>
</div>

<div class="container">

    <div class="card">

        <h1>Detail Kategori</h1>

        <div class="category-name">
            {{ $category->name }}
        </div>

        <hr>

        <h2>Daftar Buku</h2>

        @if($category->books->count() > 0)

            @foreach($category->books as $book)

                <div class="book">

                    <div class="book-title">
                        {{ $book->title }}
                    </div>

                    <div class="book-info">
                        Penulis: {{ $book->author }}
                        <br>
                        Stok: {{ $book->stock }}
                    </div>

                </div>

            @endforeach

        @else

            <div class="empty">
                Belum ada buku dalam kategori ini.
            </div>

        @endif

        <a href="{{ route('categories.index') }}" class="btn">
            ← Kembali
        </a>

    </div>

</div>

</body>
</html>
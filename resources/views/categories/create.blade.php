<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - Mini Perpus</title>

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
            max-width: 600px;
            margin: 50px auto;
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
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .error {
            color: #dc2626;
            margin-bottom: 15px;
        }

        .buttons {
            margin-top: 20px;
        }

        .btn {
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
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

        <h1>Tambah Kategori</h1>

        <p>Masukkan nama kategori buku.</p>

        @if($errors->any())
            <div class="error">
                <strong>Terjadi kesalahan:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">

            @csrf

            <label for="name">Nama Kategori</label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Contoh: Teknologi"
            >

            <div class="buttons">

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->latest()->get();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
        ], [
            'title.required' => 'Judul buku wajib diisi.',
            'author.required' => 'Nama penulis wajib diisi.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori tidak valid.',
            'stock.required' => 'Stok wajib diisi.',
            'stock.integer' => 'Stok harus berupa angka.',
            'stock.min' => 'Stok tidak boleh kurang dari 0.',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
        ]);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $book)
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'categories'));
    }

public function update(Request $request, Book $book)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'stock' => 'required|integer|min:0',
    ], [
        'title.required' => 'Judul buku wajib diisi.',
        'author.required' => 'Nama penulis wajib diisi.',
        'category_id.required' => 'Kategori wajib dipilih.',
        'category_id.exists' => 'Kategori tidak valid.',
        'stock.required' => 'Stok wajib diisi.',
        'stock.integer' => 'Stok harus berupa angka.',
        'stock.min' => 'Stok tidak boleh kurang dari 0.',
    ]);

    $book->update([
        'title' => $request->title,
        'author' => $request->author,
        'category_id' => $request->category_id,
        'stock' => $request->stock,
    ]);

    return redirect()
        ->route('books.index')
        ->with('success', 'Buku berhasil diperbarui.');
}
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
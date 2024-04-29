<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Books;
use App\Models\Publication;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        $authors = Author::all();
        $publishers = Publication::all();
        return view('books.create', compact('authors', 'publishers'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:available,unavailable',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publications,id',
        ]);
        $book = Books::create($validatedData);
        return redirect()->route('books.create')->with('success', 'Книгу успішно додано!');
    }
    public function index()
    {
        $books = Books::paginate(10);
        return view('books.index', compact('books'));
    }
}

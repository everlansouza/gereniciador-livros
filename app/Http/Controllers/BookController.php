<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        // Implementa a busca e paginação de 10 livros por página
        $query = Book::query();

        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }
        $books = $query->paginate(10);

        return view('books.index', compact('books', 'search'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Book $book)
    {
        try {
            $book->delete();

            return response()->json([
                'success' => true,
                'message' => 'Livro deletado com sucesso!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao deletar o livro: ' . $e->getMessage()
            ], 500);
        }
    }
}

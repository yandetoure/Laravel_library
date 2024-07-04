<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Book;
use App\Models\Categorie;
use App\Models\Publisher;
use App\Models\Shelve;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('books/show',compact('books'));
    }
    public function create(){
        $books = Book::all();
        $categories = Categorie::all();
        $shelves = Shelve::all();
        $autors = Autor::all();
        $publishers = Publisher::all();
    return view('books/create', compact('books', 'categories', 'shelves', 'publishers', 'autors'));
    }
    public function store(Request $request){
        $request->validate([
            'title' =>'required',
            'description' => 'required|string|max:1000',         
            'isbn' => 'required',
            'publication_date' => 'required',
            'category_id' => 'required|exists:categories,id',
            'shelf_id' => 'required|exists:shelves,id',
            'publisher_id' => 'required|exists:publishers,id',
            'autor_id' => 'required|exists:autors,id',
        ]);

        Book::create($request->all());
        return redirect()->route('books.show')->with('succes','Le livre a été ajouté avec succès') ;
    }
    public function show(){
        $books = Book::all();
        $categories = Categorie::all();
        $shelves = Shelve::all();
        $autors = Autor::all();
        $publishers = Publisher::all();
        return view ('books.show', compact('books', 'categories', 'shelves', 'publishers', 'autors'));
    }
    
    public function edit($id)
    {
        $categories = Categorie::all();
        $shelves = Shelve::all();
        $autors = Autor::all();
        $publishers = Publisher::all();
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book', 'categories', 'shelves', 'publishers', 'autors'));
    }
    
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' =>'required',
            'description' => 'required|string|max:1000'   ,         
            'isbn' => 'required',
            'publication_date' => 'required',
            'autor_id' => 'required',
            'category_id' => 'required|exists:categories,id',
            'shelf_id' => 'required|exists:shelves,id',
            'publisher_id' => 'required|exists:publishers,id',
            'autor_id' => 'required|exists:autors,id',
        ]);
    
        $book->update($request->all());
        return redirect()->route('books.show')->with('success', 'Livre modifié avec succés.');
    }

    public function more($id){
        $book = Book::with('autor')->findOrFail($id);        
        $categories = Categorie::all();
        $shelves = Shelve::all();
        $autors = Autor::all();
        $publishers = Publisher::all();
        return view ('books.more', compact('book', 'categories', 'shelves', 'publishers', 'autors'));
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.show')->with('success', 'Livre supprimé avec succés .');
    }
    
    }
    
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Book;
use App\Models\BookCategory;


class BooksController extends BaseController
{
    public function index(Request $request)
    {
        $books = Book::state('completed')->whereNotNull('cover')->inRandomOrder()->take(32)->get();
        $categories = BookCategory::all()->where('book_count', '>=', 10);
        $abc_indicies = BookCategory::alphabetical_indicies();
        return view('books.index', compact('books', 'categories', 'abc_indicies'));
    }
}
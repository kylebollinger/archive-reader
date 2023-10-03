<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Book;
use App\Models\BookCategory;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;

class BooksController extends BaseController
{
    public function index(Request $request)
    {
        $books = Book::state('completed')
                        ->where('cover', '!=', '')
                        ->inRandomOrder()->take(32)->get();
        $categories = BookCategory::all()->where('book_count', '>=', 10);
        $abc_indicies = BookCategory::alphabetical_indicies();
        return view('books.index', compact('books', 'categories', 'abc_indicies'));
    }

    public function search(Request $request)
    {
        if ($request->keyword && strlen($request->keyword) > 0) {
            $results = (new Search())
                ->registerModel(Book::class, function(ModelSearchAspect $modelSearchAspect) {
                    $modelSearchAspect
                        ->addSearchableAttribute('title')
                        ->state('completed');
                })
                ->registerModel(BookCategory::class, 'name')
                ->search(request('keyword'));
            return view('books.searchResults', compact('results', 'request'));
        } else {
            return redirect()->route('books')->with('error', 'Invalid Search Query');
        }
    }
}
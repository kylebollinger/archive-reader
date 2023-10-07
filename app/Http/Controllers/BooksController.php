<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Book;
use App\Models\Chapter;
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

    public function categoryIndex(Request $request)
    {
        $category = BookCategory::firstWhere('slug', $request->slug);
        if (isset($category->id) && count($category->books) > 1) {
            $books = Book::where('category_id', $category->id)->state('completed')->paginate(20);
            return view('books.categoryIndex', compact('category', 'books'));
        } else {
            return redirect()->route('books.index')->with('error', 'Unable to find that category');
        }
    }

    public function alphabeticalIndex($letter)
    {
        if (!empty($letter) && preg_match("/^[a-z]{0,1}$/", $letter) == 1) {
            $books = Book::where("title", "ILIKE", "$letter%")->state('completed')->paginate(24);
            return view('books.alphabeticalIndex', compact('books', 'letter'));
        } else {
            return redirect()->route('books.index');
        }
    }

    public function reader(Request $request)
    {
        $book = Book::state('completed')->firstWhere('slug', $request->slug);
        if ($book) {
            $valid_chapter = in_array(intval($request->chapter), $book->chapters_list()->pluck('id')->toArray());
            $current_chapter = $valid_chapter ? $book->chapters_list()->where('id', $request->chapter)->first() : $book->chapters_list()->first();
            $contents = $book->volumes_with_chapters;
            return view('books.reader', compact('book', 'contents', 'current_chapter'));
        } else {
            // TODO Make a 404 page with search
            return redirect()->route('books');
        }
    }

    public function fetchChapter(Request $request)
    {
        $response = ['status' => 406, 'message' => 'Invalid parameters'];
        if ($request && !empty($request->chapter_id)) {
            $chapter = Chapter::find($request->chapter_id);
            $view = view('books.reader.content', compact('chapter'))->render();
            $response = ['status' => 201, 'html' => $view];
        }
        return response()->json($response, $response['status']);
    }
}
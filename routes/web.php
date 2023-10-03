<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(BooksController::class)->group(function () {
    Route::get('/', 'index')->name('books');
    Route::get('/search', 'search')->name('search');
    Route::post('/search{keyword?}', 'search')->name('search');
    Route::get('books/category/{slug}', 'categoryIndex')->name('books.category.index');
    Route::get('/books/index/{letter}', 'alphabeticalIndex')->name('books.alphabetical.index');
    Route::get('/books/reader/{slug}', 'reader')->name('books.reader');
});

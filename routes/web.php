<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
                         



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('books',BooksController::class); 
// Route::controller(BooksController::class)->group(function () {
//     Route::get('/books/{id}', 'show')->name('books.show');
//     Route::post('/books', 'store')->name('books.store');
//     Route::get('/books', 'index')->name('books.index');
//     Route::get('/books/{id}/edit', 'edit')->name('books.edit');
//     Route::get('/books/{id}/delete', 'delete')->name('books.delete');
//     Route::get('/books/create', 'create')->name('books.create');
// });


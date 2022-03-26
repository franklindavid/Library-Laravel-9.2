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

Route::get('/books', [BooksController::class, 'index'])->name('books.index');

Route::controller(BooksController::class)->group(function () {
    Route::get('/books/{id}', 'show')->name('books.show');
    Route::post('/books', 'store')->name('books.store');
});


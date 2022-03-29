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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('books',BooksController::class)->middleware('auth');
Route::controller(BooksController::class)->group(function () {
    Route::get('/books/{id}/delete', 'delete')->name('books.delete')->middleware('auth');
    Route::get('/books/{id}/request', 'request')->name('books.request')->middleware('auth');
    Route::get('/books/{id}/return', 'return')->name('books.return')->middleware('auth');
});
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;

class BooksController extends Controller
{
    public function show($id)
    {
        $category = Category::find(2)->books;
        dd($category);
        $book = Book::find(1)->category;
        dd($book);
        // return view('user.profile', [
        //     'user' => User::findOrFail($id)
        // ]);
    }    
}

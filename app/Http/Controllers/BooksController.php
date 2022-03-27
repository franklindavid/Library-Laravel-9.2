<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use DB; 

class BooksController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);    
        return view('books.show', ['book'=>$book]);
    }    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {           
        // dd($request->all())
        $books = Book::when($request->category, function ($query, $category) {
            $query->where('category_id', $category);
        })->when($request->book, function ($query, $book) {
            $query->where('name', 'like', '%'.$book.'%');
        })->get();
        // $books = Book::where('category_id', $request->category)->get();
        return view('home',['books'=>$books,'book'=>$request->book]);
    }
}

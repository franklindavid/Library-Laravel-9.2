<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use DB; 

use Illuminate\Support\Facades\Redirect;

class BooksController extends Controller
{
    public function show($id)
    {
        $book = Book::find($id);    
        return view('books.show', ['book'=>$book]);
    }   

    public function index(Request $request)
    {
        $book = Book::all();    
        return view('books.index', ['book'=>$book]);
    }  

    public function create(Request $request)
    {
        $book = Book::all();    
        $categories = Category::all()->pluck('name','id');    
        return view('books.create', ['book'=>$book,'categories'=>$categories]);
    }  

    public function store(StoreBookRequest $request)
    {        
        $book = new Book;        
        $book->isbn=$request->isbn;
        $book->name=$request->name;
        $book->author=$request->author;
        $book->category_id=$request->category;
        $book->publication_date=$request->publication_date;
        $book->copies=$request->copies;        
        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/img/books');
        }
        $book->image=str_replace('public/','storage/',$path);
        $book->save();  
        flash('Book Created Successfully!')->success();
        return Redirect::route('home'); 
    }    
}

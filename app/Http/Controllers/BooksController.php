<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

use App\Models\Book;
use App\Models\bookUser;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
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
    public function edit($id)
    {
        $book = Book::find($id);    
        // dd($book);
        $categories = Category::all()->pluck('name','id');    
        return view('books.edit', ['book'=>$book,'categories'=>$categories]);
    } 
    
    public function update(UpdateBookRequest $request,$id)
    {  
        $book = Book::find($id);        
        $book->isbn=$request->isbn;
        $book->name=$request->name;
        $book->author=$request->author;
        $book->category_id=$request->category;
        $book->publication_date=$request->publication_date;
        $book->copies=$request->copies;        
        if($request->hasFile('image')){
                // dd(Storage::delete($book->image));
            $book->image=str_replace('storage/','public/',$book->image);
            // dd($book->image);
            Storage::delete($book->image);
            $path = $request->file('image')->store('public/img/books');
            $book->image=str_replace('public/','storage/',$path);
        }
        $book->update();  
        flash('Book Updated Successfully!')->warning();
        return Redirect::route('home'); 
    }

    public function delete($id)
    {  
        $book = Book::find($id); 
        $book->image=str_replace('storage/','public/',$book->image);
        Storage::delete($book->image);
        $book->delete(); 
        flash('Book has been deleted Successfully!')->error();
        return Redirect::route('books.index'); 
    }

    public function request($id){  
        $book = Book::find($id); 
        if($book->copies==0){
            flash('the book is out of stock!')->error();
            return Redirect::route('home'); 
        }else{
            $book->copies=$book->copies-1;
            $bookUser = new BookUser;   
            $bookUser->book_id= $id;
            $bookUser->user_id= auth()->user()->id;
            $book->update();
            $bookUser->save();
            flash('Book has been requested Successfully!')->success();
            return Redirect::route('books.show',$bookUser->book_id); 
        }        
    }

    public function return($id){  
        $bookUser =  BookUser::find($id); 
        $book = Book::find($bookUser->book_id);
        $book->copies=$book->copies+1; 
        $book->update();
        $bookUser->delete();
        flash('Book has been returned Successfully!')->success();
        return Redirect::route('books.show',$bookUser->book_id);        
    }
}

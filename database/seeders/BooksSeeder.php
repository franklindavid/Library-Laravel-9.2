<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('America/Bogota');
        DB::table('books')->insert([
            'isbn' => "978-3-16-148410-0",            
            'name' => "Mariner Books Life of Pi",            
            'author' => "Yann Martel",
            'category_id' => 1,
            'publication_date' => date("Y-m-d H:i:s",strtotime("01/05/2003")),            
            'image' => "51rxEvLljUL._SY291_BO1,204,203,200_QL40_FMwebp_.webp",
            'user_id' => 1,            
            'copies' => 0,            
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('books')->insert([
            'isbn' => "0-7645-2641-3",    
            'name' => "To Kill a Mockingbird",            
            'author' => "Harper Lee",
            'category_id' => 2,
            'publication_date' => date("Y-m-d H:i:s",strtotime("01/01/2002")),               
            'image' => "51IXWZzlgSL._SY291_BO1,204,203,200_QL40_FMwebp_.webp",   
            'copies' => 1,        
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('books')->insert([
            'isbn' => "9786079783778",    
            'name' => "Little Women",            
            'author' => "Louisa May Alcott's",
            'category_id' => 2,
            'publication_date' => date("Y-m-d H:i:s",strtotime("25/09/2018")),            
            'image' => "51xJASXQJwL._SX323_BO1,204,203,200_.jpg",  
            'copies' => 2,            
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('books')->insert([
            'isbn' => "9781607384854",    
            'name' => "DC Comics Watchmen",            
            'author' => " Alan Moore",
            'category_id' => 3,
            'publication_date' => date("Y-m-d H:i:s",strtotime("20/05/2019")),             
            'image' => "410D4H0IqjL._SY291_BO1,204,203,200_QL40_FMwebp_.webp",    
            'copies' => 3,         
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('books')->insert([
            'isbn' => "9780829777444",    
            'name' => "The Walking Dead: Compendium One",            
            'author' => " Robert Kirkman",
            'category_id' => 3,
            'publication_date' => date("Y-m-d H:i:s",strtotime("19/05/2009")),            
            'image' => "51S12ntkIbL._SX323_BO1,204,203,200_.jpg",
            'user_id' => 1,
            'copies' => 4,              
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('books')->insert([
            'isbn' => "9781647120832",    
            'name' => "The Boy, the Mole, the Fox and the Horse",            
            'author' => " Charlie Mackesy ",
            'category_id' => 3,
            'publication_date' => date("Y-m-d H:i:s",strtotime("22/10/2019")),             
            'image' => "418D9yYGB3L._SX369_BO1,204,203,200_.jpg",     
            'copies' => 5,        
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
    }
}
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
            'name' => "Mariner Books Life of Pi",            
            'author' => "Yann Martel",
            'category_id' => 1,
            'publication_date' => date("Y-m-d H:i:s",strtotime("01/05/2003")),            
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('books')->insert([
            'name' => "To Kill a Mockingbird",            
            'author' => "Harper Lee",
            'category_id' => 2,
            'publication_date' => date("Y-m-d H:i:s",strtotime("01/01/2002")),            
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('books')->insert([
            'name' => "Little Women",            
            'author' => "Louisa May Alcott's",
            'category_id' => 2,
            'publication_date' => date("Y-m-d H:i:s",strtotime("25/09/2018")),            
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('books')->insert([
            'name' => "DC Comics Watchmen",            
            'author' => " Alan Moore",
            'category_id' => 3,
            'publication_date' => date("Y-m-d H:i:s",strtotime("20/05/2019")),            
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('books')->insert([
            'name' => "The Walking Dead: Compendium One",            
            'author' => " Robert Kirkman",
            'category_id' => 3,
            'publication_date' => date("Y-m-d H:i:s",strtotime("19/05/2009")),            
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
        DB::table('books')->insert([
            'name' => "The Boy, the Mole, the Fox and the Horse",            
            'author' => " Charlie Mackesy ",
            'category_id' => 3,
            'publication_date' => date("Y-m-d H:i:s",strtotime("22/10/2019")),            
            'created_at'=>$now,
            'updated_at'=>$now,
        ]);
    }
}
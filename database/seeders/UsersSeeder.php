<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now('America/Bogota');
        DB::table('users')->insert([
            'name' => 'Franklin David',
            'email' => 'franklindavid91@gmail.com',
            'password' => Hash::make('password'),
            'created_at'=>$now,
            'updated_at'=>$now,            
        ]);
    }
}

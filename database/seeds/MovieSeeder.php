<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie')->insert([
            'Im08' => '111222',
            'title' => 'Batman',
            'year' => '2010',
            'genre' => 'fiksi',
            'poster' => 'batman.jpg'
        ]);
    }
}

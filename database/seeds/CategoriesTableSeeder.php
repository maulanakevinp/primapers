<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'Berita'
        ]);
        DB::table('categories')->insert([
            'category' => 'Opini'
        ]);
        DB::table('categories')->insert([
            'category' => 'Sastra'
        ]);
        DB::table('categories')->insert([
            'category' => 'Fotografi'
        ]);
    }
}

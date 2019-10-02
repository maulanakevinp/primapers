<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'sub_category' => 'Straight News'
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'sub_category' => 'Feature'
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 1,
            'sub_category' => 'Investigasi'

        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'sub_category' => 'Kritik'
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 2,
            'sub_category' => 'Gagasan'
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'sub_category' => 'Resensi'
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'sub_category' => 'Cerpen'
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'sub_category' => 'Puisi'
        ]);
        DB::table('sub_categories')->insert([
            'category_id' => 3,
            'sub_category' => 'Novel'
        ]);
    }
}

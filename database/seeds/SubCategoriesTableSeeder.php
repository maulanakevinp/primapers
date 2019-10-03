<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            'category_id' => 1,
            'sub_category' => 'Straight News'
        ]);
        DB::table('subcategories')->insert([
            'category_id' => 1,
            'sub_category' => 'Feature'
        ]);
        DB::table('subcategories')->insert([
            'category_id' => 1,
            'sub_category' => 'Investigasi'

        ]);
        DB::table('subcategories')->insert([
            'category_id' => 2,
            'sub_category' => 'Kritik'
        ]);
        DB::table('subcategories')->insert([
            'category_id' => 2,
            'sub_category' => 'Gagasan'
        ]);
        DB::table('subcategories')->insert([
            'category_id' => 3,
            'sub_category' => 'Resensi'
        ]);
        DB::table('subcategories')->insert([
            'category_id' => 3,
            'sub_category' => 'Cerpen'
        ]);
        DB::table('subcategories')->insert([
            'category_id' => 3,
            'sub_category' => 'Puisi'
        ]);
        DB::table('subcategories')->insert([
            'category_id' => 3,
            'sub_category' => 'Novel'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class UtilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilities')->insert([
            'photo1' => 'photo1.jpg',
            'color' => '#000000',
        ]);
    }
}

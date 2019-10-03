<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'title' => 'PRIMAPERS',
            'photo' => '1570074477_profil-struktur-organisasi-tnkoefq.png',
            'vision' => 'Visi dari primapers adalah ...',
            'mision' => 'Misi dari primapers adalah ...',
            'history' => 'History dari primapers adalah ...',
            'about' => 'about dari primapers adalah ...'
        ]);
    }
}

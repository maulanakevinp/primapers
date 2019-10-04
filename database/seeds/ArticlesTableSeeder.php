<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'subcategory_id' => 1,
            'title' => 'Meninggalnya Presiden ke 3 Indonesia',
            'description' => "Innalilahiwainnalilahiroji'un Kami segenap keluarga LPM Prima berduka atas kepergian bapak kita yang merupakan Presiden Republik Indonesia ke 3 bapak Bacharuddin Jusuf Habibie. Pengabdian beliau tak perlu diragukan lagi, kontribusi yang sangat manis bagi perubahan Indonesia. Semoga dosa dosanya di ampuni dan amal ibadahnya diterima oleh Allah SWT Aamiin",
            'caption' => 'bapak Bacharuddin Jusuf Habibie Meninggal Dunia ',
            'photo' => '69833003_131376674818114_8266467308532528823_n.jpg',
            'created_at' => '2019-09-11 03:19:00'
        ]);
    }
}

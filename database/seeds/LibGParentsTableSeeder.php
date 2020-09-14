<?php

use Illuminate\Database\Seeder;

class LibGParentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lib_g_parents')->delete();
        
        \DB::table('lib_g_parents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '000',
                'name' => 'KARYA AM',
                'created_at' => '2020-08-11 22:40:49',
                'updated_at' => '2020-08-11 22:40:50',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => '100',
                'name' => 'FALSAFAH',
                'created_at' => '2020-08-11 22:41:32',
                'updated_at' => '2020-08-11 22:41:33',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '200',
                'name' => 'AGAMA',
                'created_at' => '2020-08-11 22:41:45',
                'updated_at' => '2020-08-11 22:41:45',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => '300',
                'name' => 'SAINS KEMASAYARAKATAN',
                'created_at' => '2020-08-11 22:42:28',
                'updated_at' => '2020-08-11 22:42:28',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => '400',
                'name' => 'BAHASA',
                'created_at' => '2020-08-11 22:42:51',
                'updated_at' => '2020-08-11 22:42:51',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => '500',
                'name' => 'SAIN TULIN',
                'created_at' => '2020-08-11 22:43:07',
                'updated_at' => '2020-08-11 22:43:07',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => '600',
                'name' => 'TEKNOLOGI',
                'created_at' => '2020-08-11 22:43:20',
                'updated_at' => '2020-08-11 22:43:21',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => '700',
                'name' => 'KESENIAN',
                'created_at' => '2020-08-11 22:43:33',
                'updated_at' => '2020-08-11 22:43:33',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => '800',
                'name' => 'KESUSTERAAN',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'code' => '900',
                'name' => 'GEOGRAFI, PEGNEMBARAAN BIOGRAFI DAN SEJARAH',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
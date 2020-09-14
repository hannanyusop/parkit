<?php

use Illuminate\Database\Seeder;

class LibOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lib_options')->delete();
        
        \DB::table('lib_options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'borrow_duration',
                'value' => '8',
                'created_at' => '2020-08-14 02:17:11',
                'updated_at' => '2020-08-14 02:22:31',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'fine',
                'value' => '0.40',
                'created_at' => '2020-08-14 02:17:11',
                'updated_at' => '2020-08-15 11:56:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'max_student_borrow',
                'value' => '3',
                'created_at' => '2020-08-14 02:17:11',
                'updated_at' => '2020-08-14 02:22:24',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'can_borrow',
                'value' => '1',
                'created_at' => '2020-08-14 02:25:56',
                'updated_at' => '2020-08-16 13:54:02',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'prefect_list',
                'value' => '{"960516135589":"ABDUL HANNAN BIN HJ YUSOP","960516135588":"AMINAH ROSLI"}',
                'created_at' => '2020-08-18 20:20:35',
                'updated_at' => '2020-08-18 21:17:01',
            ),
        ));
        
        
    }
}
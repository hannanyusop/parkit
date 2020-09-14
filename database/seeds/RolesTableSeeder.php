<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'admin',
                'name' => 'Administrator',
                'guard_name' => 'web',
                'created_at' => '2020-08-03 23:40:00',
                'updated_at' => '2020-08-03 23:40:00',
            ),
        ));
        
        
    }
}
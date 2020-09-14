<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'admin',
                'guard_name' => 'web',
                'name' => 'admin.access.user',
                'description' => 'All User Permissions',
                'parent_id' => NULL,
                'sort' => 1,
                'created_at' => '2020-08-03 23:40:00',
                'updated_at' => '2020-08-03 23:40:00',
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'admin',
                'guard_name' => 'web',
                'name' => 'admin.access.user.list',
                'description' => 'View Users',
                'parent_id' => 1,
                'sort' => 1,
                'created_at' => '2020-08-03 23:40:00',
                'updated_at' => '2020-08-03 23:40:00',
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'admin',
                'guard_name' => 'web',
                'name' => 'admin.access.user.deactivate',
                'description' => 'Deactivate Users',
                'parent_id' => 1,
                'sort' => 2,
                'created_at' => '2020-08-03 23:40:00',
                'updated_at' => '2020-08-03 23:40:00',
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'admin',
                'guard_name' => 'web',
                'name' => 'admin.access.user.reactivate',
                'description' => 'Reactivate Users',
                'parent_id' => 1,
                'sort' => 3,
                'created_at' => '2020-08-03 23:40:00',
                'updated_at' => '2020-08-03 23:40:00',
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 'admin',
                'guard_name' => 'web',
                'name' => 'admin.access.user.clear-session',
                'description' => 'Clear User Sessions',
                'parent_id' => 1,
                'sort' => 4,
                'created_at' => '2020-08-03 23:40:00',
                'updated_at' => '2020-08-03 23:40:00',
            ),
            5 => 
            array (
                'id' => 6,
                'type' => 'admin',
                'guard_name' => 'web',
                'name' => 'admin.access.user.impersonate',
                'description' => 'Impersonate Users',
                'parent_id' => 1,
                'sort' => 5,
                'created_at' => '2020-08-03 23:40:00',
                'updated_at' => '2020-08-03 23:40:00',
            ),
            6 => 
            array (
                'id' => 7,
                'type' => 'admin',
                'guard_name' => 'web',
                'name' => 'admin.access.user.change-password',
                'description' => 'Change User Passwords',
                'parent_id' => 1,
                'sort' => 6,
                'created_at' => '2020-08-03 23:40:00',
                'updated_at' => '2020-08-03 23:40:00',
            ),
            7 => 
            array (
                'id' => 8,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'poll_admin',
                'description' => 'President Koperasi',
                'parent_id' => 10,
                'sort' => 2,
                'created_at' => '2020-08-03 23:40:00',
                'updated_at' => '2020-08-03 23:40:00',
            ),
            8 => 
            array (
                'id' => 9,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'cv_guard',
                'description' => 'Covid-19 Checkin Guard',
                'parent_id' => 11,
                'sort' => 2,
                'created_at' => '2020-08-08 23:58:04',
                'updated_at' => '2020-08-08 23:58:06',
            ),
            9 => 
            array (
                'id' => 10,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'poll_can',
                'description' => 'Poll Module',
                'parent_id' => NULL,
                'sort' => 1,
                'created_at' => '2020-08-09 00:08:39',
                'updated_at' => '2020-08-09 00:08:41',
            ),
            10 => 
            array (
                'id' => 11,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'cv_can',
                'description' => 'Covid-19 Checkin Module',
                'parent_id' => NULL,
                'sort' => 1,
                'created_at' => '2020-08-18 18:19:43',
                'updated_at' => '2020-08-18 18:19:45',
            ),
            11 => 
            array (
                'id' => 12,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'lib_can',
                'description' => 'Library Module',
                'parent_id' => NULL,
                'sort' => 1,
                'created_at' => '2020-08-18 18:19:41',
                'updated_at' => '2020-08-18 18:24:41',
            ),
            12 => 
            array (
                'id' => 13,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'lib_prefects',
                'description' => 'Library Prefects',
                'parent_id' => 12,
                'sort' => 2,
                'created_at' => '2020-08-18 18:19:41',
                'updated_at' => '2020-08-18 18:24:42',
            ),
            13 => 
            array (
                'id' => 14,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'lib_staff',
                'description' => 'Library Teacher',
                'parent_id' => 12,
                'sort' => 3,
                'created_at' => '2020-08-18 18:24:44',
                'updated_at' => '2020-08-18 18:24:43',
            ),
            14 => 
            array (
                'id' => 15,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'lib_admin',
                'description' => 'Library Admin',
                'parent_id' => 12,
                'sort' => 4,
                'created_at' => '2020-08-18 18:24:44',
                'updated_at' => '2020-08-18 18:24:43',
            ),
            15 => 
            array (
                'id' => 16,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'portal_can',
                'description' => 'Portal Admin',
                'parent_id' => NULL,
                'sort' => 1,
                'created_at' => '2020-08-18 18:24:44',
                'updated_at' => '2020-08-18 18:24:43',
            ),
            16 => 
            array (
                'id' => 17,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'hostel_can',
                'description' => 'Hostel Module',
                'parent_id' => NULL,
                'sort' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'type' => 'user',
                'guard_name' => 'web',
                'name' => 'hostel_warden',
                'description' => 'Hostel Warden',
                'parent_id' => NULL,
                'sort' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;

class ValidationSectionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('validation_sections')->delete();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        \DB::table('validation_sections')->insert(array (
            0 => 
            array (
                'id' => 1,
                'section' => 'Validation',
                'description' => 'test',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-26 13:19:26',
                'updated_at' => '2019-09-30 16:10:05',
            ),
            1 => 
            array (
                'id' => 2,
                'section' => 'Role and Permission',
                'description' => 'role test',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-26 13:19:48',
                'updated_at' => '2019-09-30 16:59:51',
            ),
            2 => 
            array (
                'id' => 3,
                'section' => 'Site setting',
                'description' => 'fsdfsd',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-26 13:20:05',
                'updated_at' => '2019-10-02 17:04:50',
            ),
            3 => 
            array (
                'id' => 4,
                'section' => 'Menu',
                'description' => 'sec',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-27 19:49:10',
                'updated_at' => '2019-09-27 19:49:10',
            ),
            4 => 
            array (
                'id' => 5,
                'section' => 'asas',
                'description' => 'asas',
                'is_active' => 0,
                'is_deleted' => 1,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => 10,
                'deleted_at' => '2019-09-30 15:36:29',
                'created_at' => '2019-09-30 15:36:25',
                'updated_at' => '2019-09-30 15:36:29',
            ),
            5 => 
            array (
                'id' => 6,
                'section' => 'Users Control',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-30 18:11:16',
                'updated_at' => '2019-09-30 18:11:16',
            ),
            6 => 
            array (
                'id' => 7,
                'section' => 'Membership',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-30 19:07:38',
                'updated_at' => '2019-09-30 19:07:38',
            ),
            7 => 
            array (
                'id' => 8,
                'section' => 'Lookups',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-30 19:18:21',
                'updated_at' => '2019-09-30 19:18:21',
            ),
            8 => 
            array (
                'id' => 9,
                'section' => 'Note',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-10-02 17:07:41',
                'updated_at' => '2019-10-02 17:07:41',
            ),
            9 => 
            array (
                'id' => 10,
                'section' => 'Icon',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-10-03 15:26:54',
                'updated_at' => '2019-10-03 15:26:54',
            ),
            10 => 
            array (
                'id' => 11,
                'section' => 'User Profile',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 10,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-10-03 17:30:38',
                'updated_at' => '2019-10-03 17:30:38',
            ),
            11 => 
            array (
                'id' => 12,
                'section' => 'Template',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 2,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-10-31 18:35:17',
                'updated_at' => '2019-10-31 18:35:17',
            ),
            12 => 
            array (
                'id' => 13,
                'section' => 'Purchase Order',
                'description' => 'purchase order validations',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-12-25 12:30:44',
                'updated_at' => '2019-12-25 12:30:44',
            ),
            13 => 
            array (
                'id' => 14,
                'section' => 'Account',
                'description' => 'Validation for account section.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-12-31 13:35:53',
                'updated_at' => '2019-12-31 13:35:53',
            ),
            14 => 
            array (
                'id' => 18,
                'section' => 'Zip',
                'description' => 'zip validation',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-21 13:38:53',
                'updated_at' => '2020-01-21 13:42:41',
            ),
            15 => 
            array (
                'id' => 19,
                'section' => 'Faq',
                'description' => 'Faq Validation',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-21 18:33:55',
                'updated_at' => '2020-01-21 18:33:55',
            ),
        ));
        
        
    }
}
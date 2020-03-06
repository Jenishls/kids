<?php

use Illuminate\Database\Seeder;

class LookupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('set foreign_key_checks = 0');
        \DB::table('lookups')->delete();
        
        \DB::table('lookups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'payment_code',
                'section_id' => 1,
                'value' => 'check',
                'description' => 'Payment method.',
                'is_active' => 0,
                'is_deleted' => 1,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => 1,
                'deleted_at' => '2019-09-20 19:31:51',
                'created_at' => '2019-09-18 16:20:46',
                'updated_at' => '2019-09-20 19:31:51',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'payment_code',
                'section_id' => 1,
                'value' => 'ACH',
                'description' => 'Payment method.',
                'is_active' => 0,
                'is_deleted' => 1,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => 1,
                'deleted_at' => '2019-09-20 19:32:08',
                'created_at' => '2019-09-18 16:21:17',
                'updated_at' => '2019-09-20 19:32:08',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'person_title',
                'section_id' => 1,
                'value' => 'Mr',
                'description' => 'Person title.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 16:21:58',
                'updated_at' => '2019-09-18 16:21:58',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'person_title',
                'section_id' => 1,
                'value' => 'Ms',
                'description' => 'Person title.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 16:22:22',
                'updated_at' => '2019-09-18 16:22:22',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'person_title',
                'section_id' => 1,
                'value' => 'Mrs',
                'description' => 'Person title.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 16:22:45',
                'updated_at' => '2019-09-18 16:22:45',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'phone_type',
                'section_id' => 1,
                'value' => 'Home',
                'description' => 'Phone type.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 16:23:22',
                'updated_at' => '2019-09-18 16:23:22',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'phone_type',
                'section_id' => 1,
                'value' => 'Office',
                'description' => 'Phone type.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 16:23:47',
                'updated_at' => '2019-09-18 16:23:47',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 'sex',
                'section_id' => 1,
                'value' => 'male',
                'description' => 'Male',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 16:24:25',
                'updated_at' => '2019-09-18 16:24:25',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 'sex',
                'section_id' => 1,
                'value' => 'femlae',
                'description' => 'Female',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 16:24:49',
                'updated_at' => '2019-09-18 16:24:49',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => 'sex',
                'section_id' => 1,
                'value' => 'other',
                'description' => 'Other',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 16:25:12',
                'updated_at' => '2019-09-18 16:25:12',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 'person_title',
                'section_id' => 1,
                'value' => 'Dr',
                'description' => 'Person title.',
                'is_active' => 0,
                'is_deleted' => 1,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => 1,
                'deleted_at' => '2019-09-20 18:00:40',
                'created_at' => '2019-09-18 16:25:59',
                'updated_at' => '2019-09-20 18:00:40',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => 'account_type',
                'section_id' => 2,
                'value' => 'updateable',
                'description' => 'Update account.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 19:46:45',
                'updated_at' => '2019-09-18 19:46:45',
            ),
            12 => 
            array (
                'id' => 13,
                'code' => 'phone_type',
                'section_id' => 1,
                'value' => 'emergency',
                'description' => 'Emergency contact number.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 19:47:52',
                'updated_at' => '2019-09-18 19:47:52',
            ),
            13 => 
            array (
                'id' => 14,
                'code' => 'payment_code',
                'section_id' => 3,
                'value' => 'check',
                'description' => 'Payment type.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 19:48:30',
                'updated_at' => '2019-09-18 19:48:30',
            ),
            14 => 
            array (
                'id' => 15,
                'code' => 'payment_code',
                'section_id' => 3,
                'value' => 'ACH',
                'description' => 'Payment type.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-18 19:48:57',
                'updated_at' => '2019-09-18 19:48:57',
            ),
            15 => 
            array (
                'id' => 16,
                'code' => 'sex',
                'section_id' => 1,
                'value' => 'robot',
                'description' => 'No gender. Just robot.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-20 18:24:18',
                'updated_at' => '2019-09-20 18:24:18',
            ),
            16 => 
            array (
                'id' => 17,
                'code' => 'payment_code',
                'section_id' => 1,
                'value' => 'ACH',
                'description' => 'Lookup audit test.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-20 19:33:02',
                'updated_at' => '2019-09-23 19:44:40',
            ),
            17 => 
            array (
                'id' => 18,
                'code' => 'id_card_type',
                'section_id' => 4,
                'value' => 'passport',
                'description' => 'passport',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-20 19:33:02',
                'updated_at' => '2019-09-23 19:44:40',
            ),
            18 => 
            array (
                'id' => 19,
                'code' => 'cell_phone',
                'section_id' => 5,
                'value' => 'Cell Phone',
                'description' => 'Cell phone type communication Preference',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-13 13:50:27',
                'updated_at' => '2020-01-13 14:20:44',
            ),
            19 => 
            array (
                'id' => 20,
                'code' => 'telephone',
                'section_id' => 5,
                'value' => 'Telephone',
                'description' => 'Telephone type communiction preference',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-13 13:55:22',
                'updated_at' => '2020-01-13 14:21:07',
            ),
            20 => 
            array (
                'id' => 21,
                'code' => 'office_phone',
                'section_id' => 5,
                'value' => 'Office Phone',
                'description' => 'Office phone type communiction',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-13 13:55:41',
                'updated_at' => '2020-01-13 14:21:30',
            ),
            21 => 
            array (
                'id' => 22,
                'code' => 'home_phone',
                'section_id' => 5,
                'value' => 'Home phone',
                'description' => 'Home phone communication',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-13 13:55:56',
                'updated_at' => '2020-01-13 14:21:43',
            ),
            22 => 
            array (
                'id' => 23,
                'code' => '2/10, net 30',
                'section_id' => 6,
                'value' => '2/10, net 30',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-14 13:16:35',
                'updated_at' => '2020-01-14 13:16:35',
            ),
            23 => 
            array (
                'id' => 24,
                'code' => 'test_reference',
                'section_id' => 7,
                'value' => 'Test References',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-14 13:32:52',
                'updated_at' => '2020-01-14 13:32:52',
            ),
            24 => 
            array (
                'id' => 25,
                'code' => 'task_status',
                'section_id' => 9,
                'value' => 'To Do',
                'description' => '#26c281',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 16:16:32',
                'updated_at' => '2020-01-16 16:17:35',
            ),
            25 => 
            array (
                'id' => 26,
                'code' => 'task_status',
                'section_id' => 9,
                'value' => 'Process',
                'description' => '#1bbc9b',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 16:17:05',
                'updated_at' => '2020-01-16 16:17:05',
            ),
            26 => 
            array (
                'id' => 27,
                'code' => 'task_status',
                'section_id' => 9,
                'value' => 'Testing',
                'description' => '#f7ca18',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 16:17:05',
                'updated_at' => '2020-01-16 16:17:05',
            ),
            27 => 
            array (
                'id' => 28,
                'code' => 'task_status',
                'section_id' => 9,
                'value' => 'Tested',
                'description' => '#36d7b7',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 16:17:05',
                'updated_at' => '2020-01-16 16:17:05',
            ),
            28 => 
            array (
                'id' => 29,
                'code' => 'task_status',
                'section_id' => 9,
                'value' => 'Closed',
                'description' => '#d05454',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 16:17:05',
                'updated_at' => '2020-01-16 16:17:05',
            ),
            29 => 
            array (
                'id' => 30,
                'code' => 'task_type',
                'section_id' => 9,
                'value' => 'Bug',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'code' => 'task_type',
                'section_id' => 9,
                'value' => 'Error',
                'description' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'code' => 'project_type',
                'section_id' => 10,
                'value' => 'Web based',
                'description' => 'web based',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'code' => 'project_status',
                'section_id' => 10,
                'value' => 'Desktop',
                'description' => 'desktop',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        \DB::statement('set foreign_key_checks = 1');
    }
}
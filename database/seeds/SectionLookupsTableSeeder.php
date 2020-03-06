<?php

use Illuminate\Database\Seeder;

class SectionLookupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('section_lookups')->delete();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        
        \DB::table('section_lookups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'section' => 'personal information',
                'description' => 'lookup for personal information',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-17 12:27:50',
                'updated_at' => '2019-09-17 12:27:52',
            ),
            1 => 
            array (
                'id' => 2,
                'section' => 'account information',
                'description' => 'lookup for account information',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'section' => 'payments',
                'description' => 'lookup for payments',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'section' => 'id_card_type',
                'description' => 'Membership card type.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'section' => 'communication_preference',
                'description' => 'Communication preferences lookups for client and member type.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-13 13:47:53',
                'updated_at' => '2020-01-13 14:22:16',
            ),
            5 => 
            array (
                'id' => 6,
                'section' => 'credit_terms',
                'description' => 'Lookup for credit Terms',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-14 13:12:33',
                'updated_at' => '2020-01-14 13:12:33',
            ),
            6 => 
            array (
                'id' => 7,
                'section' => 'company_references',
                'description' => 'References Lookup for company',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-14 13:30:16',
                'updated_at' => '2020-01-14 13:30:16',
            ),
            7 => 
            array (
                'id' => 8,
                'section' => 'Task',
                'description' => 'task lookup',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 16:13:04',
                'updated_at' => '2020-01-16 16:13:04',
            ),
            8 => 
            array (
                'id' => 9,
                'section' => 'Taskboard',
                'description' => 'task board lookup',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 16:13:20',
                'updated_at' => '2020-01-16 16:13:38',
            ),
            9 => 
            array (
                'id' => 10,
                'section' => 'Project',
                'description' => 'project lookup',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-16 16:13:52',
                'updated_at' => '2020-01-16 16:13:52',
            ),
        ));
        
        
    }
}
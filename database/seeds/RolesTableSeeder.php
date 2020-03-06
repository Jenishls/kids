<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->delete();
        
        DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_name' => 'admin',
                'label' => 'admin',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 2,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-13 12:25:33',
                'updated_at' => '2019-09-13 12:25:33',
            ),
            1 => 
            array (
                'id' => 2,
                'role_name' => 'user',
                'label' => 'user',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 2,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-13 12:25:40',
                'updated_at' => '2019-09-13 12:25:40',
            ),
        ));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
    }
}
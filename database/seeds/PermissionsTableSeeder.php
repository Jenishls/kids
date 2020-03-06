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

        \DB::table('permissions')->insert(array(
            0 =>
            array(
                'id' => 1,
                'permission_name' => 'Dashboard all',
                'action' => 'add|view|edit|delete',
                'is_active' => 0,
                'is_deleted' => 1,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => 1,
                'deleted_at' => '2019-09-13 20:31:15',
                'created_at' => '2019-09-13 20:30:33',
                'updated_at' => '2019-09-13 20:31:15',
            ),
            1 =>
            array(
                'id' => 2,
                'permission_name' => 'Dashboard all',
                'action' => 'add|view|edit|delete',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-13 20:31:11',
                'updated_at' => '2019-09-13 20:31:11',
            ),
            2 =>
            array(
                'id' => 3,
                'permission_name' => 'edit profile',
                'action' => 'view|edit',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-16 17:04:30',
                'updated_at' => '2019-09-16 17:04:30',
            ),
            3 =>
            array(
                'id' => 4,
                'permission_name' => 'new project',
                'action' => 'view|add|edit',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-16 17:17:22',
                'updated_at' => '2019-09-16 17:17:22',
            ),
        ));
    }
}

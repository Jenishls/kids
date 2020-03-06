<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('pages')->delete();

        \DB::table('pages')->insert(array(
            0 =>
            array(
                'id' => 1,
                'page_name' => 'Dashboard',
                'action' => 'view|add|edit|delete',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-13 20:29:52',
                'updated_at' => '2019-09-13 20:29:52',
            ),
            1 =>
            array(
                'id' => 2,
                'page_name' => 'Profile',
                'action' => 'view|edit|add|delete',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-16 17:02:08',
                'updated_at' => '2019-09-16 17:02:08',
            ),
            2 =>
            array(
                'id' => 3,
                'page_name' => 'project',
                'action' => 'view|add|edit|delete',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-16 17:17:43',
                'updated_at' => '2019-09-16 17:17:43',
            ),
        ));
    }
}

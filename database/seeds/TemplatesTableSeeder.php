<?php

use Illuminate\Database\Seeder;

class TemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('templates')->delete();

        \DB::table('templates')->insert(array(
            0 =>
            array(
                'id' => 1,
                'temp_name' => 'support',
                'folder' => 'support',
                'site_name' => 'main',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-10-23 17:09:13',
            ),
            1 =>
            array(
                'id' => 2,
                'temp_name' => 'support new',
                'folder' => 'supportNew',
                'site_name' => 'test',
                'is_active' => 1,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-10-23 17:09:13',
            ),
        ));
    }
}

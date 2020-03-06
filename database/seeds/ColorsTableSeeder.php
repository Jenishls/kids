<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('set foreign_key_checks = 0');

        \DB::table('colors')->delete();

        \DB::statement('set foreign_key_checks = 1');
        
        \DB::table('colors')->insert(array (
            0 => 
            array (
                'color' => 'Not Available',
                'color_code' => NULL,
                'created_at' => '2019-12-24 13:39:54',
                'deleted_at' => NULL,
                'id' => 1,
                'image' => '',
                'is_active' => 0,
                'is_deleted' => 0,
                'seq_no' => NULL,
                'updated_at' => '2019-12-24 13:39:54',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
        ));
        
        
    }
}
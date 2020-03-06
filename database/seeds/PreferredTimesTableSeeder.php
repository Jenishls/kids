<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferredTimesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('preferred_times')->delete();
        
        DB::table('preferred_times')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'from' => '9',
                'id' => 1,
                'is_active' => 0,
                'is_deleted' => 0,
                'seq' => 1,
                'time_flag' => 'am',
                'to' => '11',
                'type' => 'delivery',
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            1 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'from' => '11',
                'id' => 2,
                'is_active' => 0,
                'is_deleted' => 0,
                'seq' => 2,
                'time_flag' => 'pm',
                'to' => '1',
                'type' => 'delivery',
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            2 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'from' => '1',
                'id' => 3,
                'is_active' => 0,
                'is_deleted' => 0,
                'seq' => 3,
                'time_flag' => 'pm',
                'to' => '3',
                'type' => 'delivery',
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            3 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'from' => '9',
                'id' => 4,
                'is_active' => 0,
                'is_deleted' => 0,
                'seq' => 1,
                'time_flag' => 'am',
                'to' => '11',
                'type' => 'pickup',
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            4 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'from' => '11',
                'id' => 5,
                'is_active' => 0,
                'is_deleted' => 0,
                'seq' => 2,
                'time_flag' => 'pm',
                'to' => '1',
                'type' => 'pickup',
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            5 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'from' => '1',
                'id' => 6,
                'is_active' => 0,
                'is_deleted' => 0,
                'seq' => 3,
                'time_flag' => 'pm',
                'to' => '3',
                'type' => 'pickup',
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
        ));
        
        
    }
}
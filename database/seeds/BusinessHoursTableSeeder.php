<?php

use Illuminate\Database\Seeder;

class BusinessHoursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('business_hours')->delete();
        
        \DB::table('business_hours')->insert(array (
            0 => 
            array (
                'id' => 1,
                'day' => 'Sunday',
                'open_time' => '-',
                'close_time' => '-',
                'status' => 'Close',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-26 14:40:50',
                'updated_at' => '2019-09-26 14:40:50',
            ),
            1 => 
            array (
                'id' => 2,
                'day' => 'Monday',
                'open_time' => '10:00 AM',
                'close_time' => '10:00 PM',
                'status' => 'Open',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => 2,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-26 14:41:27',
                'updated_at' => '2019-09-27 14:43:19',
            ),
            2 => 
            array (
                'id' => 4,
                'day' => 'Saturday',
                'open_time' => '11:00 AM',
                'close_time' => '5:00 PM',
                'status' => 'Open',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => 2,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-26 15:01:05',
                'updated_at' => '2019-09-26 15:02:01',
            ),
            3 => 
            array (
                'id' => 5,
                'day' => 'Tuesday',
                'open_time' => '10:00 AM',
                'close_time' => '10:00 PM',
                'status' => 'Open',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-27 14:43:50',
                'updated_at' => '2019-09-27 14:43:50',
            ),
            4 => 
            array (
                'id' => 6,
                'day' => 'Wednesday',
                'open_time' => '10:00 AM',
                'close_time' => '10:00 AM',
                'status' => 'Open',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-27 14:44:22',
                'updated_at' => '2019-09-27 14:44:22',
            ),
            5 => 
            array (
                'id' => 7,
                'day' => 'Thursday',
                'open_time' => '10:00 AM',
                'close_time' => '10:00 PM',
                'status' => 'Open',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-27 14:44:57',
                'updated_at' => '2019-09-27 14:44:57',
            ),
            6 => 
            array (
                'id' => 8,
                'day' => 'Friday',
                'open_time' => '10:00 AM',
                'close_time' => '10:00 PM',
                'status' => 'Open',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-27 14:45:21',
                'updated_at' => '2019-09-27 14:45:21',
            ),
        ));
        
        
    }
}
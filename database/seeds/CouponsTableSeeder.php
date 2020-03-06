<?php

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('coupons')->delete();
        
        \DB::table('coupons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'test',
                'value' => 10.0,
                'code' => 'CS10411',
                'description' => 'Description',
                'start_date' => '2019-12-09 00:00:00',
                'end_date' => '2019-12-31 00:00:00',
                'usage' => 1,
                'min_price' => 100.0,
                'type' => 'percentage',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => 2,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-12-09 13:05:21',
                'updated_at' => '2019-12-09 13:05:45',
            ),
        ));
        
        
    }
}
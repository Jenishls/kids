<?php

use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('set foreign_key_checks = 0');
        \DB::table('sizes')->delete();
        \DB::statement('set foreign_key_checks = 1');
        
        \DB::table('sizes')->insert(array (
            0 => 
            array (
                'created_at' => '2019-12-24 13:30:18',
                'deleted_at' => NULL,
                'high' => NULL,
                'id' => 1,
                'is_active' => 0,
                'is_deleted' => 0,
                'long' => NULL,
                'measurement_type' => NULL,
                'price' => NULL,
                'size' => 'L',
                'updated_at' => '2019-12-24 13:30:18',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
                'wide' => NULL,
            ),
            1 => 
            array (
                'created_at' => '2019-12-24 13:30:18',
                'deleted_at' => NULL,
                'high' => NULL,
                'id' => 2,
                'is_active' => 0,
                'is_deleted' => 0,
                'long' => NULL,
                'measurement_type' => NULL,
                'price' => NULL,
                'size' => 'XL',
                'updated_at' => '2019-12-24 13:30:18',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
                'wide' => NULL,
            ),
            2 => 
            array (
                'created_at' => '2019-12-24 13:45:12',
                'deleted_at' => NULL,
                'high' => NULL,
                'id' => 3,
                'is_active' => 0,
                'is_deleted' => 0,
                'long' => NULL,
                'measurement_type' => NULL,
                'price' => NULL,
                'size' => 'Not Available',
                'updated_at' => '2019-12-24 13:45:12',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
                'wide' => NULL,
            ),
            3 => 
            array (
                'created_at' => '2019-12-24 13:54:53',
                'deleted_at' => NULL,
                'high' => NULL,
                'id' => 4,
                'is_active' => 0,
                'is_deleted' => 0,
                'long' => NULL,
                'measurement_type' => NULL,
                'price' => NULL,
                'size' => 'King',
                'updated_at' => '2019-12-24 13:54:53',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
                'wide' => NULL,
            ),
            4 => 
            array (
                'created_at' => '2019-12-24 13:54:53',
                'deleted_at' => NULL,
                'high' => NULL,
                'id' => 5,
                'is_active' => 0,
                'is_deleted' => 0,
                'long' => NULL,
                'measurement_type' => NULL,
                'price' => NULL,
                'size' => 'Queen',
                'updated_at' => '2019-12-24 13:54:53',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
                'wide' => NULL,
            ),
            5 => 
            array (
                'created_at' => '2019-12-24 13:54:53',
                'deleted_at' => NULL,
                'high' => NULL,
                'id' => 6,
                'is_active' => 0,
                'is_deleted' => 0,
                'long' => NULL,
                'measurement_type' => NULL,
                'price' => NULL,
                'size' => 'Full',
                'updated_at' => '2019-12-24 13:54:53',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
                'wide' => NULL,
            ),
            6 => 
            array (
                'created_at' => '2019-12-24 13:54:53',
                'deleted_at' => NULL,
                'high' => NULL,
                'id' => 7,
                'is_active' => 0,
                'is_deleted' => 0,
                'long' => NULL,
                'measurement_type' => NULL,
                'price' => NULL,
                'size' => 'Single',
                'updated_at' => '2019-12-24 13:54:53',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
                'wide' => NULL,
            ),
        ));
        
        
    }
}
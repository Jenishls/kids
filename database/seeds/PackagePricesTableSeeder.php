<?php

use Illuminate\Database\Seeder;

class PackagePricesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('set foreign_key_checks = 0');
        \DB::table('package_prices')->delete();   
        \DB::statement('set foreign_key_checks = 1');
        \DB::table('package_prices')->insert(array (
            0 => 
            array (
                'created_at' => '2019-12-31 20:47:02',
                'date_from' => '2019-12-31 00:00:00',
                'date_to' => '2019-12-31 00:00:00',
                'deleted_at' => NULL,
                'dis_amt' => 0.0,
                'id' => 1,
                'is_active' => 0,
                'is_deleted' => 0,
                'package_name' => '1 Bedroom',
                'package_type_id' => 1,
                'price' => 69.0,
                'updated_at' => '2019-12-31 20:47:02',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            1 => 
            array (
                'created_at' => '2019-12-31 20:48:48',
                'date_from' => '2019-12-31 00:00:00',
                'date_to' => '2019-12-31 00:00:00',
                'deleted_at' => NULL,
                'dis_amt' => 0.0,
                'id' => 2,
                'is_active' => 0,
                'is_deleted' => 0,
                'package_name' => '2 Bedroom',
                'package_type_id' => 1,
                'price' => 103.0,
                'updated_at' => '2019-12-31 20:48:48',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            2 => 
            array (
                'created_at' => '2019-12-31 20:49:38',
                'date_from' => '2019-12-31 00:00:00',
                'date_to' => '2019-12-31 00:00:00',
                'deleted_at' => NULL,
                'dis_amt' => 0.0,
                'id' => 3,
                'is_active' => 0,
                'is_deleted' => 0,
                'package_name' => '3 Bedroom',
                'package_type_id' => 1,
                'price' => 151.0,
                'updated_at' => '2019-12-31 20:49:38',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            3 => 
            array (
                'created_at' => '2019-12-31 20:50:29',
                'date_from' => '2019-12-31 00:00:00',
                'date_to' => '2019-12-31 00:00:00',
                'deleted_at' => NULL,
                'dis_amt' => 0.0,
                'id' => 4,
                'is_active' => 0,
                'is_deleted' => 0,
                'package_name' => '4 Bedroom',
                'package_type_id' => 1,
                'price' => 199.0,
                'updated_at' => '2019-12-31 20:50:29',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            4 => 
            array (
                'created_at' => '2019-12-31 20:51:12',
                'date_from' => '2019-12-31 00:00:00',
                'date_to' => '2019-12-31 00:00:00',
                'deleted_at' => NULL,
                'dis_amt' => 0.0,
                'id' => 5,
                'is_active' => 0,
                'is_deleted' => 0,
                'package_name' => '5 Bedroom',
                'package_type_id' => 1,
                'price' => 254.0,
                'updated_at' => '2019-12-31 20:51:12',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            5 => 
            array (
                'created_at' => '2019-12-31 20:51:51',
                'date_from' => '2019-12-31 00:00:00',
                'date_to' => '2019-12-31 00:00:00',
                'deleted_at' => NULL,
                'dis_amt' => 0.0,
                'id' => 6,
                'is_active' => 0,
                'is_deleted' => 0,
                'package_name' => '6 Bedroom',
                'package_type_id' => 1,
                'price' => 365.0,
                'updated_at' => '2019-12-31 20:51:51',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            6 => 
            array (
                'created_at' => '2019-12-31 20:52:54',
                'date_from' => '2019-12-31 00:00:00',
                'date_to' => '2019-12-31 00:00:00',
                'deleted_at' => NULL,
                'dis_amt' => 0.0,
                'id' => 7,
                'is_active' => 0,
                'is_deleted' => 0,
                'package_name' => '1 - 10 Employees',
                'package_type_id' => 2,
                'price' => 147.0,
                'updated_at' => '2019-12-31 20:52:54',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            7 => 
            array (
                'created_at' => '2019-12-31 20:53:36',
                'date_from' => '2019-12-31 00:00:00',
                'date_to' => '2019-12-31 00:00:00',
                'deleted_at' => NULL,
                'dis_amt' => 0.0,
                'id' => 8,
                'is_active' => 0,
                'is_deleted' => 0,
                'package_name' => '11 - 20 Employees',
                'package_type_id' => 2,
                'price' => 294.0,
                'updated_at' => '2019-12-31 20:53:36',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            8 => 
            array (
                'created_at' => '2019-12-31 20:54:29',
                'date_from' => '2019-12-31 00:00:00',
                'date_to' => '2019-12-31 00:00:00',
                'deleted_at' => NULL,
                'dis_amt' => 0.0,
                'id' => 9,
                'is_active' => 0,
                'is_deleted' => 0,
                'package_name' => '21 - 30 Employees',
                'package_type_id' => 2,
                'price' => 441.0,
                'updated_at' => '2019-12-31 20:54:29',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            9 => 
            array (
                'created_at' => '2019-12-31 20:55:16',
                'date_from' => '2019-12-31 00:00:00',
                'date_to' => '2019-12-31 00:00:00',
                'deleted_at' => NULL,
                'dis_amt' => 0.0,
                'id' => 10,
                'is_active' => 0,
                'is_deleted' => 0,
                'package_name' => '31- 40 Employees',
                'package_type_id' => 2,
                'price' => 588.0,
                'updated_at' => '2019-12-31 20:55:16',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;

class InventoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('set foreign_key_checks = 0');
        \DB::table('inventories')->delete();
        \DB::statement('set foreign_key_checks = 1');
        \DB::table('inventories')->insert(array (
            0 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:24:59',
                'deleted_at' => NULL,
                'id' => 1,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Labels',
                'price' => 0.0,
                'product_id' => 14,
                'quantity' => 500,
                'size_id' => 3,
                'updated_at' => '2019-12-31 20:24:59',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            1 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:26:19',
                'deleted_at' => NULL,
                'id' => 2,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Large',
                'price' => 2.0,
                'product_id' => 1,
                'quantity' => 100,
                'size_id' => 1,
                'updated_at' => '2019-12-31 20:26:19',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            2 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:27:17',
                'deleted_at' => NULL,
                'id' => 3,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'XL',
                'price' => 3.0,
                'product_id' => 2,
                'quantity' => 100,
                'size_id' => 2,
                'updated_at' => '2019-12-31 20:27:17',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            3 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:27:45',
                'deleted_at' => NULL,
                'id' => 4,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Large',
                'price' => 5.0,
                'product_id' => 3,
                'quantity' => 100,
                'size_id' => 1,
                'updated_at' => '2019-12-31 20:27:45',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            4 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:28:06',
                'deleted_at' => NULL,
                'id' => 5,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'XL',
                'price' => 7.0,
                'product_id' => 4,
                'quantity' => 100,
                'size_id' => 2,
                'updated_at' => '2019-12-31 20:28:06',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            5 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:28:34',
                'deleted_at' => NULL,
                'id' => 6,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Wardrobe',
                'price' => 8.0,
                'product_id' => 5,
                'quantity' => 50,
                'size_id' => 3,
                'updated_at' => '2019-12-31 20:28:34',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            6 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:28:59',
                'deleted_at' => NULL,
                'id' => 7,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Hand Truck',
                'price' => 10.0,
                'product_id' => 6,
                'quantity' => 30,
                'size_id' => 3,
                'updated_at' => '2019-12-31 20:28:59',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            7 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:29:36',
                'deleted_at' => NULL,
                'id' => 8,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Lilfting Strap',
                'price' => 3.0,
                'product_id' => 7,
                'quantity' => 50,
                'size_id' => 3,
                'updated_at' => '2019-12-31 20:29:36',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            8 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:30:09',
                'deleted_at' => NULL,
                'id' => 9,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'File Bars',
                'price' => 1.0,
                'product_id' => 8,
                'quantity' => 100,
                'size_id' => 3,
                'updated_at' => '2019-12-31 20:30:09',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            9 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:30:56',
                'deleted_at' => NULL,
                'id' => 10,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Extras',
                'price' => 8.5,
                'product_id' => 9,
                'quantity' => 100,
                'size_id' => 1,
                'updated_at' => '2019-12-31 20:30:56',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            10 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:31:21',
                'deleted_at' => NULL,
                'id' => 11,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Extras',
                'price' => 11.0,
                'product_id' => 10,
                'quantity' => 100,
                'size_id' => 3,
                'updated_at' => '2019-12-31 20:31:21',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            11 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:31:53',
                'deleted_at' => NULL,
                'id' => 12,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Extras',
                'price' => 3.0,
                'product_id' => 11,
                'quantity' => 500,
                'size_id' => 3,
                'updated_at' => '2019-12-31 20:31:53',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            12 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:32:29',
                'deleted_at' => NULL,
                'id' => 13,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Extras',
                'price' => 0.5,
                'product_id' => 12,
                'quantity' => 200,
                'size_id' => 3,
                'updated_at' => '2019-12-31 20:32:29',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            13 => 
            array (
                'color_id' => 1,
                'company_id' => 1,
                'created_at' => '2019-12-31 20:32:53',
                'deleted_at' => NULL,
                'id' => 14,
                'inv_hold' => NULL,
                'inv_return' => NULL,
                'inv_sold' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Extras',
                'price' => 8.0,
                'product_id' => 13,
                'quantity' => 50,
                'size_id' => 3,
                'updated_at' => '2019-12-31 20:32:53',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
        ));
        
        
    }
}
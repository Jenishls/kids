<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('set foreign_key_checks = 0');
        \DB::table('product_categories')->delete();
        \DB::statement('set foreign_key_checks = 1');
        \DB::table('product_categories')->insert(array (
            0 => 
            array (
                'category_id' => 4,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:07:22',
                'deleted_at' => NULL,
                'id' => 1,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 1,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:07:22',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            1 => 
            array (
                'category_id' => 4,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:12:04',
                'deleted_at' => NULL,
                'id' => 2,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 2,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:12:04',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            2 => 
            array (
                'category_id' => 4,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:12:39',
                'deleted_at' => NULL,
                'id' => 3,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 3,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:12:39',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            3 => 
            array (
                'category_id' => 4,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:13:02',
                'deleted_at' => NULL,
                'id' => 4,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 4,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:13:02',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            4 => 
            array (
                'category_id' => 4,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:13:37',
                'deleted_at' => NULL,
                'id' => 5,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 5,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:13:37',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            5 => 
            array (
                'category_id' => 4,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:14:07',
                'deleted_at' => NULL,
                'id' => 6,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 6,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:14:07',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            6 => 
            array (
                'category_id' => 4,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:14:39',
                'deleted_at' => NULL,
                'id' => 7,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 7,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:14:39',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            7 => 
            array (
                'category_id' => 4,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:15:40',
                'deleted_at' => NULL,
                'id' => 8,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 8,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:15:40',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            8 => 
            array (
                'category_id' => 5,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:16:07',
                'deleted_at' => NULL,
                'id' => 9,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 9,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:16:07',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            9 => 
            array (
                'category_id' => 5,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:16:33',
                'deleted_at' => NULL,
                'id' => 10,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 10,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:16:33',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            10 => 
            array (
                'category_id' => 5,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:17:39',
                'deleted_at' => NULL,
                'id' => 11,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 11,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:17:39',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            11 => 
            array (
                'category_id' => 5,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:18:09',
                'deleted_at' => NULL,
                'id' => 12,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 12,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:18:09',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            12 => 
            array (
                'category_id' => 5,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:18:35',
                'deleted_at' => NULL,
                'id' => 13,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 13,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:18:35',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            13 => 
            array (
                'category_id' => 6,
                'child_category' => NULL,
                'created_at' => '2019-12-31 20:19:00',
                'deleted_at' => NULL,
                'id' => 14,
                'is_active' => 0,
                'is_deleted' => 0,
                'product_id' => 14,
                'sub_category' => NULL,
                'updated_at' => '2019-12-31 20:19:00',
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
        ));
        
        
    }
}
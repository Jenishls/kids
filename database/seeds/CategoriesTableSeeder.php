<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('set foreign_key_checks = 0');
        \DB::table('categories')->delete();
        \DB::statement('set foreign_key_checks = 1');
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'category' => 'Crates',
                'created_at' => '2019-12-24 12:53:00',
                'deleted_at' => NULL,
                'id' => 1,
                'is_active' => 0,
                'is_deleted' => 0,
                'parent_id' => NULL,
                'type' => NULL,
                'updated_at' => '2019-12-24 12:53:00',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            1 => 
            array (
                'category' => 'L Crates',
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 2,
                'is_active' => 0,
                'is_deleted' => 0,
                'parent_id' => NULL,
                'type' => NULL,
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            2 => 
            array (
                'category' => 'XL Crates',
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 3,
                'is_active' => 0,
                'is_deleted' => 0,
                'parent_id' => NULL,
                'type' => NULL,
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            3 => 
            array (
                'category' => 'Rental',
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 4,
                'is_active' => 0,
                'is_deleted' => 0,
                'parent_id' => NULL,
                'type' => NULL,
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            4 => 
            array (
                'category' => 'Items for Purchase',
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 5,
                'is_active' => 0,
                'is_deleted' => 0,
                'parent_id' => NULL,
                'type' => NULL,
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            5 => 
            array (
                'category' => 'Add Ons',
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 6,
                'is_active' => 0,
                'is_deleted' => 0,
                'parent_id' => NULL,
                'type' => NULL,
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
        ));
        
        
    }
}
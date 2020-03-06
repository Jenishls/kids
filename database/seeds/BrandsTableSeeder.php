<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('set foreign_key_checks = 0');
        \DB::table('brands')->delete();
        \DB::statement('set foreign_key_checks = 1');
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'created_at' => NULL,
                'deleted_at' => NULL,
                'id' => 1,
                'is_active' => 0,
                'is_deleted' => 0,
                'name' => 'Crates On Skates',
                'seq_no' => NULL,
                'shortName' => NULL,
                'updated_at' => NULL,
                'userc_id' => NULL,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
        ));
        
        
    }
}
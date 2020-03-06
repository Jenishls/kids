<?php

use Illuminate\Database\Seeder;

class PackageTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::statement('set foreign_key_checks = 0');
        \DB::table('package_types')->delete();
        \DB::statement('set foreign_key_checks = 1');
        \DB::table('package_types')->insert(array (
            0 => 
            array (
                'created_at' => '2019-12-31 20:47:02',
                'deleted_at' => NULL,
                'id' => 1,
                'is_active' => 0,
                'is_deleted' => 0,
                'type' => 'Residential',
                'updated_at' => '2019-12-31 20:47:02',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
            1 => 
            array (
                'created_at' => '2019-12-31 20:52:54',
                'deleted_at' => NULL,
                'id' => 2,
                'is_active' => 0,
                'is_deleted' => 0,
                'type' => 'Office',
                'updated_at' => '2019-12-31 20:52:54',
                'userc_id' => 1,
                'userd_id' => NULL,
                'useru_id' => NULL,
            ),
        ));
        
        
    }
}
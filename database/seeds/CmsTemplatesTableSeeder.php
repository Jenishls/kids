<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CmsTemplatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); 
        DB::table('cms_templates')->delete();
        
        DB::table('cms_templates')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'Netlify',
                'url' => '/netlifytemp',
                'site_name' => 'netlify',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 17,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-12 12:46:03',
                'updated_at' => '2019-11-27 15:38:22',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'cratesOnSkates',
                'url' => '/',
                'site_name' => 'Crates',
                'is_active' => 1,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-11-27 15:38:11',
                'updated_at' => '2019-11-29 18:04:28',
            ),
        ));
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); 
    }
}
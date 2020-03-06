<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'c_name' => 'Apple',
                'url' => 'aaasd@asd.com',
                'start_date' => '2019-12-05',
                'status' => 'active',
                'company_info' => NULL,
                'company_desc' => 'asdsadasdad',
                'industry' => 'aa',
                'reg_no' => 'asdaads',
                'credit_terms' => NULL,
                'reference' => NULL,
                'account_code' => NULL,
                'ownership' => NULL,
                'type' => NULL,
                'is_default' => 0,
                'is_system' => 0,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-12-12 15:06:22',
                'updated_at' => '2019-12-12 15:06:22',
            ),
            1 => 
            array (
                'id' => 2,
                'c_name' => 'Shubhu Tech',
                'url' => 'info@shubhu.com',
                'start_date' => '2015-01-05',
                'status' => 'active',
                'company_info' => NULL,
                'company_desc' => NULL,
                'industry' => 'IT',
                'reg_no' => '1234567890',
                'credit_terms' => 'test',
                'reference' => NULL,
                'account_code' => '12345',
                'ownership' => 'Private',
                'type' => NULL,
                'is_default' => 0,
                'is_system' => 0,
                'is_active' => 1,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-09 14:34:04',
                'updated_at' => '2020-01-09 14:34:04',
            ),
        ));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        
    }
}
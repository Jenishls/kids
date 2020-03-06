<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->delete();

        DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'shubhu',
                'email' => 'shubhu@shubhu.com',
                'username' => 'shubhutech',
                'is_locked' => 0,
                'mobile_no' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$qX8Bj7mlZMhiUihD.I9wq.cDxqpEwjLqBtHNZ2YrSF3phie7VOZQu',
                'remember_token' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
				'api_token'=>'',
                'userc_id' => 0,
                'useru_id' => 0,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-13 12:35:06',
                'updated_at' => '2019-09-19 13:32:59',
            ),
        ));
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

    \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('members')->delete();
         

        \DB::table('members')->insert(array(
            0 =>
            array(
                'id' => 1,
                'user_id' => 1,
                'salutation' => 'Mr',
                'first_name' => 'Shubhu',
                'middle_name' => NULL,
                'last_name' => 'Tech',
                'home_phone_no' => NULL,
                'mobile_no' => '(111) 111-1111',
                'office_phone_no' => NULL,
                'office_email' => NULL,
                'personal_email' => 'shubhu@shubhu.com',
                'other_email' => NULL,
                'date_of_birth' => NULL,
                'sex' => NULL,
                'marital_status' => NULL,
                'ann_date' => NULL,
                'place_of_birth' => NULL,
                'nationality' => NULL,
                'religion' => NULL,
                'race' => NULL,
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => 2,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-13 12:35:06',
                'updated_at' => '2019-09-19 13:32:59',
            ),
        ));
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

<?php

use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('site_settings')->delete();
        
        \DB::table('site_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'test2',
                'value' => '123123123',
                'description' => 'This is a test setting',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => 1,
                'userd_id' => 1,
                'deleted_at' => '2019-09-13 18:13:17',
                'created_at' => NULL,
                'updated_at' => '2019-09-18 20:16:12',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'some_code',
                'value' => '345345345',
                'description' => 'This is a demo code.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => 1,
                'deleted_at' => '2019-09-13 15:36:44',
                'created_at' => '2019-09-13 14:33:28',
                'updated_at' => '2019-09-13 15:36:44',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'page_id',
                'value' => '1234eewzczxz',
                'description' => 'another demo test',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => 1,
                'deleted_at' => '2019-09-16 13:48:30',
                'created_at' => '2019-09-13 14:39:21',
                'updated_at' => '2019-09-16 13:48:30',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'mailtrap_username',
                'value' => 'b6d903d02f68442342342',
                'description' => 'SMTP mail server sandbox username.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-13 18:11:37',
                'updated_at' => '2019-09-16 13:48:00',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'mailtrap_password',
                'value' => '5b4b46a7133a77eswerwr',
                'description' => 'Mailtrap SMTP mail server sandbox password.',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-13 18:12:58',
                'updated_at' => '2019-09-16 13:48:06',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'something_code',
                'value' => 'somerandomvalue234234234',
                'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => 1,
                'deleted_at' => '2019-09-16 17:08:34',
                'created_at' => '2019-09-16 17:07:31',
                'updated_at' => '2019-09-16 17:11:21',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'new_code',
                'value' => 'qwEWDAwedadasda234234',
                'description' => 'test',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-17 18:05:53',
                'updated_at' => '2019-09-17 18:05:53',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 'code_2',
                'value' => 'dsf4s65d6s5d1zxcv21',
                'description' => 'code 2',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-09-17 18:06:13',
                'updated_at' => '2019-09-17 18:06:13',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 'asdasd',
                'value' => '345345353',
                'description' => 'another test field',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'code' => '123123123',
                'value' => '1231231231231',
                'description' => 'testing audit',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2019-09-23 19:11:52',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 'qwe123qwe123',
                'value' => 'tyutyuopio890890',
                'description' => 'pagination check',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => NULL,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'code' => '123123123',
                'value' => 'rtegdfbvffgb',
                'description' => 'Test for audit.',
                'is_active' => 0,
                'is_deleted' => 1,
                'userc_id' => NULL,
                'useru_id' => 1,
                'userd_id' => 1,
                'deleted_at' => '2019-09-23 19:46:39',
                'created_at' => '2019-09-23 14:09:17',
                'updated_at' => '2019-09-23 19:46:39',
            ),
            12 => 
            array (
                'id' => 21,
                'code' => 'dateFormat',
                'value' => 'm/d/Y',
                'description' => 'Default date format',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2019-12-31 17:17:37',
                'updated_at' => '2019-12-31 17:17:37',
            ),
            13 => 
            array (
                'id' => 23,
                'code' => 'momentDateFormat',
                'value' => 'MM/DD/YYYY',
                'description' => 'Default Moment Date format',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-03 17:03:34',
                'updated_at' => '2020-01-03 17:03:34',
            ),
            14 => 
            array (
                'id' => 24,
                'code' => 'gplacesApiKey',
                'value' => 'AIzaSyAQWr22scuha6f0yLRJt5x3jhNU3dGoUiQ',
                'description' => 'Google Places Api key',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-09 19:00:29',
                'updated_at' => '2020-01-09 19:00:29',
            ),
            15 => 
            array (
                'id' => 25,
                'code' => 'googleLatLng1',
                'value' => '-33.8902, 151.1759',
                'description' => 'Google maps Latitude longitude for starting destination',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => 1,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-09 19:04:49',
                'updated_at' => '2020-01-09 19:06:19',
            ),
            16 => 
            array (
                'id' => 26,
                'code' => 'googleLatLng2',
                'value' => '-33.8474, 151.2631',
                'description' => 'Google maps latitude longtitude for end destination',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-09 19:06:08',
                'updated_at' => '2020-01-09 19:06:08',
            ),
            17 => 
            array (
                'id' => 27,
                'code' => 'disabled_days',
                'value' => 'saturday,sunday',
                'description' => 'disabled days for shipping and picking',
                'is_active' => 0,
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2020-01-14 13:53:34',
                'updated_at' => '2020-01-14 13:53:34',
            ),
        ));
        
        
    }
}
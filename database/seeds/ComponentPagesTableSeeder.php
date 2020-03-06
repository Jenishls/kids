<?php

use Illuminate\Database\Seeder;

class ComponentPagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::statement('set foreign_key_checks = 0');
        \DB::table('component_pages')->delete();
        \DB::statement('set foreign_key_checks = 1');


        \DB::table('component_pages')->insert(array(
            0 =>
            array(
                'id' => 1,
                'component_id' => 1,
                'page_id' => 1,
                'seq_no' => 1,
                'created_at' => '2019-11-20 14:57:35',
                'updated_at' => '2019-11-20 14:57:35',
            ),
            1 =>
            array(
                'id' => 2,
                'component_id' => 2,
                'page_id' => 1,
                'seq_no' => 2,
                'created_at' => '2019-11-20 15:05:07',
                'updated_at' => '2019-11-20 15:05:07',
            ),
            2 =>
            array(
                'id' => 3,
                'component_id' => 3,
                'page_id' => 1,
                'seq_no' => 3,
                'created_at' => '2019-11-20 15:09:35',
                'updated_at' => '2019-11-20 15:09:35',
            ),
            3 =>
            array(
                'id' => 4,
                'component_id' => 4,
                'page_id' => 1,
                'seq_no' => 4,
                'created_at' => '2019-11-20 15:10:00',
                'updated_at' => '2019-11-20 15:10:00',
            ),
            4 =>
            array(
                'id' => 5,
                'component_id' => 5,
                'page_id' => 1,
                'seq_no' => 5,
                'created_at' => '2019-11-20 15:11:03',
                'updated_at' => '2019-11-20 15:11:03',
            ),
            5 =>
            array(
                'id' => 6,
                'component_id' => 6,
                'page_id' => 1,
                'seq_no' => 7,
                'created_at' => '2019-11-20 15:11:31',
                'updated_at' => '2019-11-20 15:12:18',
            ),
            6 =>
            array(
                'id' => 7,
                'component_id' => 7,
                'page_id' => 1,
                'seq_no' => 6,
                'created_at' => '2019-11-20 15:12:03',
                'updated_at' => '2019-11-20 15:12:18',
            ),
            7 =>
            array(
                'id' => 8,
                'component_id' => 8,
                'page_id' => 1,
                'seq_no' => 8,
                'created_at' => '2019-11-20 15:13:49',
                'updated_at' => '2019-11-20 15:13:49',
            ),
            8 =>
            array(
                'id' => 9,
                'component_id' => 9,
                'page_id' => 2,
                'seq_no' => 1,
                'created_at' => '2019-11-20 16:37:40',
                'updated_at' => '2019-11-20 16:37:40',
            ),
            9 =>
            array(
                'id' => 10,
                'component_id' => 10,
                'page_id' => 2,
                'seq_no' => 2,
                'created_at' => '2019-11-20 17:10:50',
                'updated_at' => '2019-11-20 17:10:50',
            ),
            10 =>
            array(
                'id' => 11,
                'component_id' => 6,
                'page_id' => 2,
                'seq_no' => 3,
                'created_at' => '2019-11-20 17:14:13',
                'updated_at' => '2019-11-20 17:14:13',
            ),
            11 =>
            array(
                'id' => 12,
                'component_id' => 11,
                'page_id' => 2,
                'seq_no' => 4,
                'created_at' => '2019-11-20 17:19:21',
                'updated_at' => '2019-11-20 17:19:21',
            ),
            12 =>
            array(
                'id' => 13,
                'component_id' => 8,
                'page_id' => 2,
                'seq_no' => 5,
                'created_at' => '2019-11-20 17:19:33',
                'updated_at' => '2019-11-20 17:19:33',
            ),
            13 =>
            array(
                'id' => 14,
                'component_id' => 12,
                'page_id' => 3,
                'seq_no' => 1,
                'created_at' => '2019-11-20 17:21:36',
                'updated_at' => '2019-11-20 17:21:36',
            ),
            14 =>
            array(
                'id' => 15,
                'component_id' => 13,
                'page_id' => 3,
                'seq_no' => 2,
                'created_at' => '2019-11-20 17:21:50',
                'updated_at' => '2019-11-20 17:21:50',
            ),
            15 =>
            array(
                'id' => 16,
                'component_id' => 8,
                'page_id' => 3,
                'seq_no' => 3,
                'created_at' => '2019-11-20 17:22:02',
                'updated_at' => '2019-11-20 17:22:02',
            ),
            16 =>
            array(
                'id' => 17,
                'component_id' => 14,
                'page_id' => 4,
                'seq_no' => 1,
                'created_at' => '2019-11-20 17:22:58',
                'updated_at' => '2019-11-20 17:22:58',
            ),
            17 =>
            array(
                'id' => 18,
                'component_id' => 15,
                'page_id' => 4,
                'seq_no' => 2,
                'created_at' => '2019-11-20 17:23:06',
                'updated_at' => '2019-11-20 17:23:06',
            ),
            18 =>
            array(
                'id' => 19,
                'component_id' => 16,
                'page_id' => 4,
                'seq_no' => 3,
                'created_at' => '2019-11-20 17:23:15',
                'updated_at' => '2019-11-20 17:23:15',
            ),
            19 =>
            array(
                'id' => 20,
                'component_id' => 17,
                'page_id' => 5,
                'seq_no' => 1,
                'created_at' => '2019-11-20 17:25:20',
                'updated_at' => '2019-11-20 17:40:09',
            ),
            20 =>
            array(
                'id' => 21,
                'component_id' => 2,
                'page_id' => 5,
                'seq_no' => 2,
                'created_at' => '2019-11-20 17:25:32',
                'updated_at' => '2019-11-20 17:40:09',
            ),
            21 =>
            array(
                'id' => 22,
                'component_id' => 18,
                'page_id' => 5,
                'seq_no' => 3,
                'created_at' => '2019-11-20 17:25:42',
                'updated_at' => '2019-11-20 17:25:42',
            ),
            22 =>
            array(
                'id' => 23,
                'component_id' => 11,
                'page_id' => 5,
                'seq_no' => 4,
                'created_at' => '2019-11-20 17:25:52',
                'updated_at' => '2019-11-20 17:25:52',
            ),
            23 =>
            array(
                'id' => 24,
                'component_id' => 8,
                'page_id' => 5,
                'seq_no' => 5,
                'created_at' => '2019-11-20 17:26:01',
                'updated_at' => '2019-11-20 17:26:01',
            ),
            24 =>
            array(
                'id' => 25,
                'component_id' => 19,
                'page_id' => 6,
                'seq_no' => 1,
                'created_at' => '2019-11-20 17:27:15',
                'updated_at' => '2019-11-20 17:27:15',
            ),
            25 =>
            array(
                'id' => 26,
                'component_id' => 20,
                'page_id' => 6,
                'seq_no' => 2,
                'created_at' => '2019-11-20 17:27:22',
                'updated_at' => '2019-11-20 17:27:22',
            ),
            26 =>
            array(
                'id' => 27,
                'component_id' => 21,
                'page_id' => 7,
                'seq_no' => 1,
                'created_at' => '2019-11-20 17:28:34',
                'updated_at' => '2019-11-20 17:28:34',
            ),
            27 =>
            array(
                'id' => 28,
                'component_id' => 22,
                'page_id' => 7,
                'seq_no' => 2,
                'created_at' => '2019-11-20 17:28:42',
                'updated_at' => '2019-11-20 17:28:42',
            ),
            28 =>
            array(
                'id' => 29,
                'component_id' => 19,
                'page_id' => 8,
                'seq_no' => 1,
                'created_at' => '2019-11-20 17:30:29',
                'updated_at' => '2019-11-20 17:30:29',
            ),
            29 =>
            array(
                'id' => 30,
                'component_id' => 23,
                'page_id' => 8,
                'seq_no' => 2,
                'created_at' => '2019-11-20 17:30:38',
                'updated_at' => '2019-11-20 17:30:38',
            ),
            30 =>
            array(
                'id' => 31,
                'component_id' => 24,
                'page_id' => 9,
                'seq_no' => 1,
                'created_at' => '2019-11-20 17:32:08',
                'updated_at' => '2019-11-20 17:32:08',
            ),
            31 =>
            array(
                'id' => 32,
                'component_id' => 25,
                'page_id' => 9,
                'seq_no' => 3,
                'created_at' => '2019-11-20 17:32:21',
                'updated_at' => '2019-11-21 13:41:19',
            ),
            32 =>
            array(
                'id' => 33,
                'component_id' => 26,
                'page_id' => 9,
                'seq_no' => 4,
                'created_at' => '2019-11-20 17:32:35',
                'updated_at' => '2019-11-21 13:41:19',
            ),
            33 =>
            array(
                'id' => 34,
                'component_id' => 27,
                'page_id' => 10,
                'seq_no' => 1,
                'created_at' => '2019-11-20 17:34:02',
                'updated_at' => '2019-11-20 17:34:02',
            ),
            34 =>
            array(
                'id' => 35,
                'component_id' => 28,
                'page_id' => 10,
                'seq_no' => 2,
                'created_at' => '2019-11-20 17:34:11',
                'updated_at' => '2019-11-20 17:34:11',
            ),
            35 =>
            array(
                'id' => 36,
                'component_id' => 29,
                'page_id' => 10,
                'seq_no' => 3,
                'created_at' => '2019-11-20 17:34:25',
                'updated_at' => '2019-11-20 17:34:25',
            ),
            36 =>
            array(
                'id' => 37,
                'component_id' => 30,
                'page_id' => 10,
                'seq_no' => 4,
                'created_at' => '2019-11-20 17:34:35',
                'updated_at' => '2019-11-20 17:34:35',
            ),
            37 =>
            array(
                'id' => 38,
                'component_id' => 31,
                'page_id' => 11,
                'seq_no' => 1,
                'created_at' => '2019-11-20 17:36:10',
                'updated_at' => '2019-11-20 17:36:10',
            ),
            38 =>
            array(
                'id' => 39,
                'component_id' => 32,
                'page_id' => 11,
                'seq_no' => 2,
                'created_at' => '2019-11-20 17:36:17',
                'updated_at' => '2019-11-20 17:36:17',
            ),
            39 =>
            array(
                'id' => 40,
                'component_id' => 33,
                'page_id' => 9,
                'seq_no' => 2,
                'created_at' => '2019-11-21 13:41:01',
                'updated_at' => '2019-11-21 13:41:19',
            ),
            40 =>
            array(
                'id' => 41,
                'component_id' => 34,
                'page_id' => 12,
                'seq_no' => 1,
                'created_at' => '2019-11-29 18:33:21',
                'updated_at' => '2019-11-29 18:33:21',
            ),
            41 =>
            array(
                'id' => 42,
                'component_id' => 35,
                'page_id' => 12,
                'seq_no' => 2,
                'created_at' => '2019-11-29 19:01:00',
                'updated_at' => '2019-11-29 19:01:00',
            ),
            42 =>
            array(
                'id' => 43,
                'component_id' => 36,
                'page_id' => 12,
                'seq_no' => 3,
                'created_at' => '2019-11-29 19:01:10',
                'updated_at' => '2019-11-29 19:01:10',
            ),
            43 =>
            array(
                'id' => 45,
                'component_id' => 38,
                'page_id' => 12,
                'seq_no' => 4,
                'created_at' => '2019-11-29 19:02:01',
                'updated_at' => '2019-11-29 19:02:01',
            ),
            44 =>
            array(
                'id' => 47,
                'component_id' => 39,
                'page_id' => 22,
                'seq_no' => 1,
                'created_at' => '2019-12-13 17:14:13',
                'updated_at' => '2019-12-13 17:14:13',
            ),
            45 =>
            array(
                'id' => 48,
                'component_id' => 40,
                'page_id' => 22,
                'seq_no' => 2,
                'created_at' => '2019-12-13 17:32:36',
                'updated_at' => '2019-12-13 17:32:36',
            ),
        ));
    }
}

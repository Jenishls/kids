<?php

use Illuminate\Database\Seeder;

class AccountHeadsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \Schema::disableForeignKeyConstraints();
        \DB::table('account_heads')->delete();
        \Schema::enableForeignKeyConstraints();

        \DB::table('account_heads')->insert(array(
            0 =>
            array(
                'id' => 1,
                'type' => 'ASSET',
                'code' => 'BANK',
                'name' => 'Bank',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'type' => 'ASSET',
                'code' => 'CurAsset',
                'name' => 'Current Asset',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'type' => 'ASSET',
                'code' => 'FixedAsset',
                'name' => 'Fixed Asset',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            3 =>
            array(
                'id' => 4,
                'type' => 'LIABILITY',
                'code' => 'CurrentLiability',
                'name' => 'Current Liability',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            4 =>
            array(
                'id' => 5,
                'type' => 'LIABILITY',
                'code' => 'NonCurrentLiability',
                'name' => 'Non-Current Liability',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            5 =>
            array(
                'id' => 6,
                'type' => 'INCOME',
                'code' => 'Income',
                'name' => 'income',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            6 =>
            array(
                'id' => 7,
                'type' => 'EXPENSE',
                'code' => 'CostOfGoods',
                'name' => 'Cost Of Goods',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            7 =>
            array(
                'id' => 8,
                'type' => 'EXPENSE',
                'code' => 'Expenses',
                'name' => 'Expense',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            8 =>
            array(
                'id' => 9,
                'type' => 'EQUITY',
                'code' => 'Equity',
                'name' => 'Equity',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            9 =>
            array(
                'id' => 10,
                'type' => 'ASSET',
                'code' => 'Cash',
                'name' => 'Cash',
                'is_active' => 1,
                'created_at' => '2018-01-23 19:16:04',
                'updated_at' => '2018-01-23 19:16:04',
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
        ));
    }
}

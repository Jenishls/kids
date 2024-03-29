<?php

use Illuminate\Database\Seeder;

class AccountSubHeadsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \Schema::disableForeignKeyConstraints();
        \DB::table('account_sub_heads')->delete();
        \Schema::enableForeignKeyConstraints();
        \DB::table('account_sub_heads')->insert(array(
            0 =>
            array(
                'id' => 1,
                'account_head_id' => 1,
                'name' => 'Bank & Cash',
                'code' => 'BankCash',
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
                'account_head_id' => 2,
                'name' => 'Investments',
                'code' => 'Investment',
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
                'account_head_id' => 2,
                'name' => 'Oher Current Assets',
                'code' => 'OtherCurrentAssets',
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
                'account_head_id' => 3,
                'name' => 'Long-Term Assets',
                'code' => 'LongTermAssets',
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
                'account_head_id' => 3,
                'name' => 'Long-Term Investments',
                'code' => 'LongTermsInvestments',
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
                'account_head_id' => 4,
                'name' => 'Current Bank Debt',
                'code' => 'CurrentBankDebt',
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
                'account_head_id' => 4,
                'name' => 'Current Debt',
                'code' => 'CurrentDebt',
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
                'account_head_id' => 5,
                'name' => 'Long-Term Debt',
                'code' => 'LongTermDebt',
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
                'account_head_id' => 6,
                'name' => 'Commissions',
                'code' => 'Commission',
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
                'account_head_id' => 6,
                'name' => 'Fees & Charges',
                'code' => 'FeesCharges',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            10 =>
            array(
                'id' => 11,
                'account_head_id' => 6,
                'name' => 'Investments',
                'code' => 'Investment',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            11 =>
            array(
                'id' => 12,
                'account_head_id' => 6,
                'name' => 'Non-Profit',
                'code' => 'NonProfit',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            12 =>
            array(
                'id' => 13,
                'account_head_id' => 6,
                'name' => 'Other Income',
                'code' => 'OtherIncome',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            13 =>
            array(
                'id' => 14,
                'account_head_id' => 6,
                'name' => 'Professional Services',
                'code' => 'ProfessionalServices',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            14 =>
            array(
                'id' => 15,
                'account_head_id' => 6,
                'name' => 'Sales Products & Service',
                'code' => 'SalesProductServices',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            15 =>
            array(
                'id' => 16,
                'account_head_id' => 7,
                'name' => 'Cost Of Goods',
                'code' => 'CostOfGoods',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            16 =>
            array(
                'id' => 17,
                'account_head_id' => 8,
                'name' => 'Buildings & Equipment',
                'code' => 'BuildingsEquipment',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            17 =>
            array(
                'id' => 18,
                'account_head_id' => 8,
                'name' => 'Computers/Communication',
                'code' => 'ComputersCommunication',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            18 =>
            array(
                'id' => 19,
                'account_head_id' => 8,
                'name' => 'Fees & Charges',
                'code' => 'FeesCharges',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            19 =>
            array(
                'id' => 20,
                'account_head_id' => 8,
                'name' => 'Insurance',
                'code' => 'Insurance',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            20 =>
            array(
                'id' => 21,
                'account_head_id' => 8,
                'name' => 'NonProfit',
                'code' => 'NonProfit',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            21 =>
            array(
                'id' => 22,
                'account_head_id' => 8,
                'name' => 'Office',
                'code' => 'Office',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            22 =>
            array(
                'id' => 23,
                'account_head_id' => 8,
                'name' => 'Other Expenses',
                'code' => 'OtherExpenses',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            23 =>
            array(
                'id' => 24,
                'account_head_id' => 8,
                'name' => 'Payroll',
                'code' => 'Payroll',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            24 =>
            array(
                'id' => 25,
                'account_head_id' => 8,
                'name' => 'Services',
                'code' => 'Services',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            25 =>
            array(
                'id' => 26,
                'account_head_id' => 8,
                'name' => 'Taxes',
                'code' => 'Taxes',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            26 =>
            array(
                'id' => 27,
                'account_head_id' => 8,
                'name' => 'Tools & Supplies',
                'code' => 'ToolsSupplies',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            27 =>
            array(
                'id' => 28,
                'account_head_id' => 8,
                'name' => 'Vehicle Expenses',
                'code' => 'VehicleExpenses',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            28 =>
            array(
                'id' => 29,
                'account_head_id' => 9,
                'name' => 'Equity',
                'code' => 'Equity',
                'is_active' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'is_deleted' => 0,
                'userc_id' => 0,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            29 =>
            array(
                'id' => 30,
                'account_head_id' => 4,
                'name' => 'Account Payable',
                'code' => 'Current Liability',
                'is_active' => 1,
                'created_at' => '2018-01-23 16:51:07',
                'updated_at' => '2018-01-23 16:53:43',
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            30 =>
            array(
                'id' => 31,
                'account_head_id' => 10,
                'name' => 'Cash',
                'code' => 'cash',
                'is_active' => 1,
                'created_at' => '2018-01-23 19:16:47',
                'updated_at' => '2018-01-23 19:17:05',
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
            31 =>
            array(
                'id' => 32,
                'account_head_id' => 7,
                'name' => 'Discount Payble',
                'code' => 'discount Payable',
                'is_active' => 1,
                'created_at' => '2018-12-03 18:41:08',
                'updated_at' => '2018-12-03 18:41:08',
                'is_deleted' => 0,
                'userc_id' => 1,
                'useru_id' => NULL,
                'userd_id' => NULL,
                'deleted_at' => NULL,
            ),
        ));
    }
}

<?php

use Illuminate\Database\Seeder;

class ProductColorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
    	\DB::statement('set foreign_key_checks = 0');
        \DB::table('product_colors')->delete();
        \DB::statement('set foreign_key_checks = 1');
        
        
    }
}
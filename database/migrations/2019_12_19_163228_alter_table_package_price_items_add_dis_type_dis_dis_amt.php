<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePackagePriceItemsAddDisTypeDisDisAmt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_price_items', function (Blueprint $table) {
            $table->float('dis_amt')->nullable();
            $table->string('dis_type')->nullable();
            $table->float('dis_rate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_price_items', function (Blueprint $table) {
            $table->dropColumn('dis_amt');
            $table->dropColumn('dis_type');
            $table->dropColumn('dis_rate');
        });
    }
}

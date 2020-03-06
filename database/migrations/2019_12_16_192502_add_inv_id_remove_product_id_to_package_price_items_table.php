<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInvIdRemoveProductIdToPackagePriceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_price_items', function (Blueprint $table) {
            $table->unsignedBigInteger('inv_id')->after('package_price_id');
            $table->foreign('inv_id')
                ->references('id')
                ->on('inventories');
        });
        
        Schema::table('package_price_items', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
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
            $table->dropForeign(['inv_id']);
            $table->dropColumn('inv_id');
        });
        Schema::table('package_price_items', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->after('package_price_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
        });
    }
}

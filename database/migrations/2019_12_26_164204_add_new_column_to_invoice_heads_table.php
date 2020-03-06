<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnToInvoiceHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_heads', function (Blueprint $table) {
            $table->unsignedBigInteger('package_id')->after('client_id')->nullable();
            $table->foreign('package_id')
                ->references('id')
                ->on('package_prices');
            $table->unsignedBigInteger('pickup_addr_id')->after('client_id')->nullable();
            $table->foreign('pickup_addr_id')
                ->references('id')
                ->on('addresses');
            $table->unsignedBigInteger('shipping_addr_id')->after('client_id')->nullable();
            $table->foreign('shipping_addr_id')
                ->references('id')
                ->on('addresses');           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_heads', function (Blueprint $table) {
            $table->dropForeign(['package_id']);
            $table->dropForeign(['pickup_addr_id']);
            $table->dropForeign(['shipping_addr_id']);
            $table->dropcolumn(['package_id', 'pickup_addr_id', 'shipping_addr_id']);
        });
    }
}

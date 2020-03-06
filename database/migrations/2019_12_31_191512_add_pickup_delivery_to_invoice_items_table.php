<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPickupDeliveryToInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->date('pickup_date')->after('quantity')->nullable();
            $table->string('pickup_time')->after('pickup_date')->nullable();
            $table->date('delivery_date')->after('pickup_time')->nullable();
            $table->string('delivery_time')->after('delivery_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_items', function (Blueprint $table) {
            $table->dropColumn(['pickup_date', 'pickup_time', 'delivery_date', 'delivery_time']);
        });
    }
}

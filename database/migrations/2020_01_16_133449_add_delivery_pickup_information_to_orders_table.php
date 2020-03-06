<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeliveryPickupInformationToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('extras_delivery')->after('package_amount')->nullable();
            $table->string('zip_delivery_charge')->after('extras_delivery')->nullable();
            $table->string('extras_pickup')->after('delivery_charge')->nullable();
            $table->string('zip_pickup_charge')->after('extras_pickup')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['extras_delivery', 'zip_delivery_charge', 'extras_pickup', 'zip_pickup_charge']);
        });
    }
}

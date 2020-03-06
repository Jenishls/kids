<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsDeliveryAppartmentPickupAppartmentWeek extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->float('delivery_appartment')->nullable()->after('delivery_note');
            $table->float('pickup_appartment')->nullable()->after('delivery_note');
            $table->Integer('week')->default(1)->after('delivery_note');
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
            $table->dropColumn('delivery_appartment');
            $table->dropColumn('pickup_appartment');
            $table->dropColumn('week');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsConvertedEnmInStatusField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            DB::statement("ALTER TABLE orders MODIFY order_status ENUM('pending', 'confirmed', 'delivered', 'picked_up', 'closed', 'deleted','converted') NOT NULL");
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
            DB::statement("ALTER TABLE orders MODIFY order_status ENUM('pending', 'confirmed', 'delivered', 'picked_up', 'closed', 'deleted') NOT NULL");
            
        });
    }
}

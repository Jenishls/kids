<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class UpdateStatusColumnInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("ALTER TABLE orders CHANGE COLUMN order_status order_status ENUM('pending', 'cancelled', 'shipped', 'return', 'delivered') NOT NULL DEFAULT 'pending'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("ALTER TABLE orders CHANGE COLUMN order_status order_status ENUM('pending', 'cancelled', 'shipped', 'return', 'delivered') NOT NULL DEFAULT 'pending'");
            
    }
}

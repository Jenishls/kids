<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ChangeDeliveryTimeTypeToStringInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           
        DB::statement('ALTER TABLE orders MODIFY column delivery_time varchar(255)');
        DB::statement('ALTER TABLE orders MODIFY column pickup_time varchar(255)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('Alter table orders modify column delivery_time time');
        DB::statement('Alter table orders modify column pickup_time time');
    }
}

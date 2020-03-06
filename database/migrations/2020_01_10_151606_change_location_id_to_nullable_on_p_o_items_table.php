<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeLocationIdToNullableOnPOItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_o_items', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_o_items', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id')->nullable(false)->change();
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTaskboardListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taskboard_lists', function (Blueprint $table) {
            $table->unsignedInteger('status_id')->after("taskboard_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taskboard_lists', function (Blueprint $table) {
            $table->dropColumn('status_id');
        });
    }
}

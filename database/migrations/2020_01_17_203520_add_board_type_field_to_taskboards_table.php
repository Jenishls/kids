<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBoardTypeFieldToTaskboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('taskboards', 'board_type')) {
            Schema::table('taskboards', function (Blueprint $table) {
               $table->unsignedInteger('board_type')->after("title")->default(2);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taskboards', function (Blueprint $table) {
            $table->dropColumn("board_type");
        });
    }
}

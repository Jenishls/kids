<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTaskboardCardFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taskboard_card_files', function (Blueprint $table) {
            $table->string("file_name")->after("id")->default("file")->nullable();
            $table->string("extension")->after("taskboard_card_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('taskboard_card_files', function (Blueprint $table) {
            $table->dropColumn("file_name");
            $table->dropColumn("extension");
        });
    }
}

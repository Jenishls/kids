<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTableAndTableIdToNullableInFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->string('table')->nullable()->change();
            $table->unsignedInteger('table_id')->nullable()->change();
            $table->unsignedInteger('seq')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->string('table')->nullable(false)->change();
            $table->unsignedInteger('table_id')->nullable(false)->change();
            $table->dropColumn('seq');
        });
    }
}

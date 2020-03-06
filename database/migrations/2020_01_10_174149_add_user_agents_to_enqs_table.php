<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserAgentsToEnqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enqs', function (Blueprint $table) {
            $table->string('ip')->nullable();
            $table->string('browser')->nullable();
            $table->string('fingerprint')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enqs', function (Blueprint $table) {
            $table->dropColumn(['ip, browser, fingerprint']);
        });
    }
}

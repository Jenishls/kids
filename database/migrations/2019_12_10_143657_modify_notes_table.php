<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->string('priority')->nullable()->change();
            $table->date('todo_date')->nullable()->change();
            $table->date('start_date')->nullable()->change();
            $table->date('end_date')->nullable()->change();
            $table->string('table')->nullable();
            $table->integer('table_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->dropColumn('table_id');
            $table->dropColumn('table');
            $table->date('end_date')->nullable(false)->change();
            $table->date('start_date')->nullable(false)->change();
            $table->date('todo_date')->nullable(false)->change();
            $table->string('priority')->nullable(false)->change();
        });
    }
}

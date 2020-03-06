<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('value');
            $table->text('description');
            $table->bigInteger('user_id');
            $table->boolean('is_main');
            $table->boolean('is_section');
            $table->bigInteger('userc_id');
            $table->bigInteger('useru_id');
            $table->bigInteger('userd_id');
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layouts');
    }
}

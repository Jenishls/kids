<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('component_id');
            $table->unsignedBigInteger('page_id');
            $table->integer('seq_no')->nullable();
            $table->timestamps();

            $table->foreign('component_id')->references('id')->on('cms_components')->onUpdate('cascade');
            $table->foreign('page_id')->references('id')->on('cms_pages')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('component_pages');
    }
}

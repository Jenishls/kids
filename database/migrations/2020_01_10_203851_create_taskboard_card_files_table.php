<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskboardCardFilesTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $this->down();
        Schema::create('taskboard_card_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("path")->nullable();
            $table->unsignedBigInteger("taskboard_card_id");
            $table->foreign('taskboard_card_id')->references('id')->on('taskboard_cards')->onUpdate('cascade')->onDelete('restrict');
            $this->default($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskboard_card_files');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskboardCardsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskboard_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',100);
            $table->text('description')->nullable();
            $table->unsignedInteger('seq_no');
            $table->date('due_date')->nullable();
            $table->unsignedBigInteger('taskboard_list_id');
            $table->foreign('taskboard_list_id')
                ->references('id')
                ->on('taskboard_lists')
                ->onUpdate('cascade')
                ->onDelete('restrict');
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
        Schema::dropIfExists('taskboard_cards');
    }
}

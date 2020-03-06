<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashBoxesTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_boxes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cash_master_id');
            $table->foreign('cash_master_id')
                ->references('id')->on('cash_masters')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->date('date')->nullable();
            $table->string('table')->nullable();
            $table->string('table_id')->nullable();
            $table->text('description')->nullable();
            $table->double('dr')->nullable();
            $table->double('cr')->nullable();

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cash_boxes');
        Schema::enableForeignKeyConstraints();
    }
}

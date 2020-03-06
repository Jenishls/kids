<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('journal_date')->nullable();
            $table->string('table')->nullable();
            $table->unsignedInteger('table_id')->nullable();
            $table->string('description')->nullable();
            $table->string('ref_no', 50)->nullable();
            $table->boolean('status')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();

            $table->foreign('approved_by')->references('id')->on('users')
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
        Schema::dropIfExists('journals');
    }
}

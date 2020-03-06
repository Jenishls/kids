<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferredTimesTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferred_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('from')->nullable();
            $table->string('to')->nullable();
            $table->enum('time_flag', ['am', 'pm'])->nullable();
            $table->enum('type', ['delivery', 'pickup'])->nullable();
            $table->integer('seq')->nullable();
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
        Schema::dropIfExists('preferred_times');
    }
}

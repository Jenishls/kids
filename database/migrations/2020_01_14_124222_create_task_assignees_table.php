<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskAssigneesTable extends Migration
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
        Schema::create('task_assignees', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('task_id');
            
            $table->foreign('task_id')->references('id')->on('tasks')->onUpdate('cascade')->onDelete('restrict');

            $table->unsignedBigInteger('user_id');
           
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');

            $table->date('assigned_date');

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('task_assignees');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

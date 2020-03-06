<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title');

            $table->unsignedInteger('project_id')->default(1);

            $table->unsignedInteger('task_type_id')->index();

            $table->enum('priority', ['high', 'medium', 'low']);

            $table->unsignedInteger('status')->nullable()->index();

            $table->boolean('is_completed')->default(0);
            
            $table->float('progress')->default(0);  
            
            $table->boolean('is_todo')->default(0);           

            $table->unsignedBigInteger('assigned_by')->nullable();

            $table->foreign('assigned_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');

            $table->unsignedBigInteger('current_workflow_id')->index();
            
            $table->date('reminder_date')->nullable();
            
            $table->date('start_date')->nullable();
            
            $table->string('estimate_hours')->nullable();
            
            $table->string('actual_hours')->nullable();
            
            $table->timestamp('due_date')->nullable();

            $table->boolean('is_sub_task')->default(0);
            
            $table->unsignedBigInteger('parent_task_id')->nullable();
            
            $table->foreign('parent_task_id')->references('id')->on('tasks')->onUpdate('cascade')->onDelete('restrict')->nullable();

            $table->boolean('is_private')->default(0);

            $table->boolean('is_billable')->default(0);

            $table->text('cause')->nullable();

            $table->text('conclusion')->nullable();

            $table->longText('desc')->nullable();
                     
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
        Schema::dropIfExists('tasks');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

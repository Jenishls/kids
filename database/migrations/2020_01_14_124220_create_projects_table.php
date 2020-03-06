<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
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
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name');
            
            $table->unsignedInteger('project_type_id')->nullable();

            $table->string('url');

            $table->date('start_date')->nullable();
            
            $table->date('estimation_date')->nullable();
            
            $table->date('due_date')->nullable();

            $table->unsignedInteger('project_manager')->nullable();
            
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->text("description")->nullable();
            $table->double("budget")->nullable();
            $table->double("expected_exp")->nullable();
            $table->float("progress")->nullable();
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
        Schema::dropIfExists('projects');
    }
}

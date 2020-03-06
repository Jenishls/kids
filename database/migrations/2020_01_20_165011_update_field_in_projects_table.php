<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateFieldInProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('project_name', 'title');
            $table->renameColumn('project_type_id', 'project_type');
            $table->renameColumn('estimation_date', 'estimated_date');
            $table->unsignedBigInteger('status')->after("project_manager")->default(1);
            $table->enum('priority', ['high', 'medium', 'low'])->after("due_date")->default("medium");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->renameColumn('project_type', 'project_type_id');
            $table->renameColumn('title', 'project_name');
            $table->renameColumn('estimated_date', 'estimation_date');
            $table->dropColumn('status');
            DB::statement("ALTER TABLE projects drop priority");
        });
    }
}

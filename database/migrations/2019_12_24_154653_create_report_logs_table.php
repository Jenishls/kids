<?php

use App\Traits\DefaultFields;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportLogsTable extends Migration
{
    use DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('report_type', 100);
            $table->string('report_name');
            $table->text('file_name');
            $table->text('query');
            $this->default($table, 1);
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
        Schema::dropIfExists('report_logs');
    }
}

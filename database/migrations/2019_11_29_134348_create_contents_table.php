<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    use App\Traits\DefaultFields;
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table')->nullable();
            $table->unsignedInteger('table_id')->nullable();
            $table->string('section')->nullable();
            $table->text('title');
            $table->text('sub_title')->nullable();
            $table->mediumText('highlight')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedInteger('seq_no')->nullable();
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
        Schema::dropIfExists('contents');
    }
}

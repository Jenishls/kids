<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsPagesTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('template_id');
            $table->string('page_name');
            $table->string('page_code')->nullable();
            $table->string('target')->nullable();
            $table->text('content')->nullable();
            $this->default($table);
            $table->timestamps();

            $table->foreign('template_id')->references('id')->on('cms_templates');
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
        Schema::dropIfExists('cms_pages');
        Schema::enableForeignKeyConstraints();
    }
}

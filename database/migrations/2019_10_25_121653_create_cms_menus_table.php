<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsMenusTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('route')->nullable();
            $table->boolean('is_parent')->default(0);
            $table->unsignedBigInteger('template_id')->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('icon')->nullable();
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
        Schema::dropIfExists('cms_menus');
        Schema::enableForeignKeyConstraints();
    }
}

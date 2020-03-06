<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->nullable();
            $table->string('name');
            $table->string('route')->nullable();
            $table->string('seq')->nullable();
            $table->string('icon')->nullable();
            $table->string('co_no')->default(0);
            $table->date('userc_date')->nullable();
            $table->date('useru_date')->nullable();
            $table->time('userc_time')->nullable();
            $table->time('useru_time')->nullable();
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
        Schema::dropIfExists('menus');
    }
}

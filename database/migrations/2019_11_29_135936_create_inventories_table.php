<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    use App\Traits\DefaultFields;
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')
                ->references('id')
                ->on('colors');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id')
                ->references('id')
                ->on('sizes');
            $table->unsignedInteger('inv_hold')->nullable();
            $table->unsignedInteger('inv_sold')->nullable();
            $table->unsignedInteger('inv_return')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}

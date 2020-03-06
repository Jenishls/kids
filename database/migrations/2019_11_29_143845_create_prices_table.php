<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    use App\Traits\DefaultFields;
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table')->nullable();
            $table->unsignedInteger('table_id')->nullable();
            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->foreign('inventory_id')
                ->references('id')
                ->on('inventories');
            $table->string('price_type')->nullable();
            $table->float('price');
            $table->dateTime('date_from')->nullable();
            $table->dateTime('date_to')->nullable();
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
        Schema::dropIfExists('prices');
    }
}

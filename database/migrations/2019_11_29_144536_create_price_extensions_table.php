<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceExtensionsTable extends Migration
{
    use App\Traits\DefaultFields;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_extensions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('price_id');
            $table->foreign('price_id')
                ->references('id')
                ->on('prices');
            $table->string('extension_type')->nullable();
            $table->float('amount')->nullable();
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
        Schema::dropIfExists('price_extensions');
    }
}

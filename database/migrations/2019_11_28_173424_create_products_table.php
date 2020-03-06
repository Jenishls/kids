<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('title');
            $table->string('sub_title');
            $table->mediumText('short_desc');
            $table->boolean('has_size')->default(1);
            $table->boolean('has_color')->default(1);
            //maybe add weight in inventory
            $table->double('weight')->nullable();
            $table->string('weight_type')->nullable();
            //add weight in inventory
            $table->dateTime('manufacture_date')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->integer('unit_quantity')->unsigned()->nullable();
            $table->string('unit_price_label')->nullable();
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
        Schema::dropIfExists('products');
    }
}

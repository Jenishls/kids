<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuoteItemsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        $this->down();
        Schema::create('quote_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quote_id');
            $table->foreign('quote_id')
                ->references('id')
                ->on('quotes');
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
            $table->dateTime('purchase_date')->nullable();
            $table->float('estimate_price')->nullable();
            $table->float('actual_price')->nullable();
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->foreign('tax_id')
                ->references('id')
                ->on('taxes');
            $table->dateTime('received_date')->nullable();
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations');
            $table->unsignedBigInteger('insurance_comp_id')->nullable();
            $table->foreign('insurance_comp_id')
                ->references('id')
                ->on('companies');
            $table->timestamp('life')->nullable();
            $table->unsignedInteger('total_quantity')->nullable();
            $table->longText('description')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('quote_items');
        Schema::enableForeignKeyConstraints();
    }
}

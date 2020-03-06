<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceItemsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_head_id');
            $table->foreign('invoice_head_id')
                ->references('id')
                ->on('invoice_heads');
            $table->unsignedBigInteger('inventory_id')->nullable();
            $table->foreign('inventory_id')
                ->references('id')
                ->on('inventories');
            $table->integer('quantity');
            $table->float('amount');
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
        Schema::dropIfExists('invoice_items');
    }
}

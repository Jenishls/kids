<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    use App\Traits\DefaultFields;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('po_number');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')
                ->references('id')
                ->on('companies');
            $table->dateTime('delivery_date')->nullable();
            $table->dateTime('release_date')->nullable();
            $table->unsignedBigInteger('approved_id');
            $table->foreign('approved_id')
                ->references('id')
                ->on('companies');
            $table->unsignedBigInteger('requested_id');
            $table->foreign('requested_id')
                ->references('id')
                ->on('companies');
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
        Schema::dropIfExists('purchase_orders');
        Schema::enableForeignKeyConstraints();
    }
}

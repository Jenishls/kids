<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    use App\Traits\DefaultFields;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
            $table->unsignedBigInteger('billing_addr_id')->nullable();
            $table->foreign('billing_addr_id')
                ->references('id')
                ->on('addresses');
            $table->unsignedBigInteger('shipping_addr_id')->nullable();
            $table->foreign('shipping_addr_id')
                ->references('id')
                ->on('addresses');
            $table->unsignedBigInteger('delivery_addr_id')->nullable();
            $table->foreign('delivery_addr_id')
                ->references('id')
                ->on('addresses');
            $table->dateTime('delivery_date')->nullable();
            $table->time('delivery_time')->nullable();
            $table->string('delivery_by')->nullable();
            $table->text('delivery_note')->nullable();
            $table->dateTime('pickup_date')->nullable();
            $table->time('pickup_time')->nullable();
            $table->string('pickup_by')->nullable();
            $table->text('pickup_note')->nullable();
            $table->unsignedInteger('package_id')->nullable();
            $table->string('prefer_method_of_contact')->nullable();
            $table->enum('order_status', ['pending', 'cancelled', 'shipped', 'return'])->nullable();
           
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
        Schema::dropIfExists('orders');
    }
}

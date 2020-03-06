<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceHeadsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_heads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_no');
            $table->unsignedBigInteger('order_id');
        $table->foreign('order_id')
                ->references('id')
                ->on('orders');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')
                ->references('id')
                ->on('clients');
            $table->float('amount');
            $table->float('package_amount')->nullable();
            $table->enum('type', ['debit', 'credit'])->nullable();
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
        Schema::dropIfExists('invoice_heads');
    }
}

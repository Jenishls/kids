<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    use App\Traits\DefaultFields;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders');
            $table->string('payment_type');
            $table->string('gateway');
            $table->string('cr_last4')->length(4);
            $table->unsignedInteger('cr_exp_month')->length(2);
            $table->unsignedInteger('cr_exp_year')->length(4);
            $table->string('transaction_id');
            $table->string('card_last_name');
            $table->string('billing_zip_code');
            $table->float('amount');
            $table->string('ref_no')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('payments');
    }
}

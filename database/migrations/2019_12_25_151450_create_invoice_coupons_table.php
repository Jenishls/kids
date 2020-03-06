<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceCouponsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coupon');
            $table->unsignedBigInteger('invoice_head_id');
            $table->foreign('invoice_head_id')
                ->references('id')
                ->on('invoice_heads');
            $table->float('discount');
            $table->string('type');
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
        Schema::dropIfExists('invoice_coupons');
    }
}

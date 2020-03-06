<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnsToInvoiceCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_coupons', function (Blueprint $table) {
            $table->dropColumn(['coupon', 'discount', 'type']);
            $table->text('name')->after('invoice_head_id')->nullable();
            $table->text('description')->after('name')->nullable();
            $table->text('code')->after('description');
            $table->float('amount')->after('code');           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_coupons', function (Blueprint $table) {
            $table->string('coupon');
            $table->float('discount')->after('invoice_head_id');
            $table->string('type')->after('invoice_head_id');
            $table->dropColumn(['name', 'description', 'code', 'amount']);
        });
    }
}

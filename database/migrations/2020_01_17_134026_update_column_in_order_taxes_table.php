<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnInOrderTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_taxes', function (Blueprint $table) {
           $table->dropForeign(['tax_id']); 
           $table->dropColumn(['tax_id']); 
           $table->string('type')->index()->nullable();
           $table->string('tax_code')->nullable();
           $table->float('tax_value')->nullable();
           $table->float('applied_amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_taxes', function (Blueprint $table) {
            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')
                ->references('id')
                ->on('taxes');
            $table->dropColumn(['type', 'tax_code', 'tax_value', 'applied_amount']);
        });
    }
}

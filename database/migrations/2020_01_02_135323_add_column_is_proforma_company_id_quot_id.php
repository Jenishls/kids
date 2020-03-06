<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIsProformaCompanyIdQuotId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_heads', function (Blueprint $table) {
            $table->unsignedInteger('is_proforma')->nullable();
            $table->unsignedInteger('company_id')->after('client_id')->nullable();
            $table->unsignedInteger('quot_id')->after('order_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_heads', function (Blueprint $table) {
            $table->dropColumn('is_proforma');
            $table->dropColumn('company_id');
            $table->dropColumn('quot_id');
        });
    }
}

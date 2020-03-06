<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOwnershipUrlReferencesCreditTermsToCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('ownership')->nullable()->after('reg_no');
            $table->string('account_code')->nullable()->after('reg_no');
            $table->string('reference')->nullable()->after('reg_no');
            $table->string('credit_terms')->nullable()->after('reg_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['ownership','account_code','reference','credit_terms']);
        });
    }
}

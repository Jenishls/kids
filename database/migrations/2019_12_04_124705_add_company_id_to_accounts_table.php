<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            Schema::table('accounts', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id')->nullable();
                $table->foreign('company_id')
                    ->references('id')
                    ->on('companies');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign('company_id');
            $table->dropColumn('company_id');
        });
    }
}

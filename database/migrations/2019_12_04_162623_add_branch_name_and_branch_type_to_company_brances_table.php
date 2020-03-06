<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBranchNameAndBranchTypeToCompanyBrancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_brances', function (Blueprint $table) {
            $table->string('branch_name');
            $table->string('branch_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_brances', function (Blueprint $table) {
            $table->dropColumn(['branch_name','branch_type']);
        });
    }
}

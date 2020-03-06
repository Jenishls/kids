<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePackagePricesAddPackageType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_prices', function (Blueprint $table) {
            $table->unsignedBigInteger("package_type_id")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_prices', function (Blueprint $table) {
            $table->dropColumn('package_type_id');
        });
    }
}

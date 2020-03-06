<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id')->nullable()->change();
            $table->string('table')->nullable()->after('member_id');
            $table->integer('table_id')->nullable()->after('member_id');
            $table->boolean('is_temp')->default(0)->after('is_present');
            $table->boolean('is_per')->default(0)->after('is_present');
            $table->boolean('is_default')->default(0)->after('is_present');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropColumn('is_default');
            $table->dropColumn('is_per');
            $table->dropColumn('is_temp');
            $table->dropColumn('table_id');
            $table->dropColumn('table');
            $table->unsignedBigInteger('member_id')->nullable(false)->change();
        });
    }
}

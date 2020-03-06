<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserPersonalColumnsInAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('first_name')->after('address_type')->nullable();
            $table->string('middle_name')->after('first_name')->nullable();
            $table->string('last_name')->after('middle_name')->nullable();
            $table->string('email')->after('last_name')->nullable();
            $table->string('phone')->after('email')->nullable();
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
            $table->dropColumn(['first_name', 'middle_name','last_name', 'email', 'phone']);
        });
    }
}

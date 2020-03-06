<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveForeignKeyFromCompanyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_members', function (Blueprint $table) {
            $table->dropForeign(['member_id']);
            $table->dropColumn(['member_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_members', function (Blueprint $table) {
             $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members');
        });
    }
}

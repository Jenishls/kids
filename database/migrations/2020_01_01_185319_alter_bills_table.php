<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropColumn('table');
            $table->dropColumn('table_id');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->foreign('member_id')->references('id')->on('users')->onUpdate('cascade');
            $table->dropForeign(['account_head']);
            $table->foreign('account_head')->references('id')->on('account_sub_head_items')->onUpdate('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bills', function (Blueprint $table) {
            $table->dropForeign(['account_head']);
            $table->foreign('account_head')->references('id')->on('account_heads')->onUpdate('cascade')->change();
            $table->dropForeign(['member_id']);
            $table->dropColumn('member_id');
            $table->dropForeign(['account_id']);
            $table->dropColumn('account_id');
            $table->integer('table_id');
            $table->string('table');
        });
    }
}

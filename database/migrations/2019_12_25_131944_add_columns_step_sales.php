<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsStepSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('add_ons', function (Blueprint $table) {
            $table->dropForeign(['color_id']);
            $table->dropColumn('color_id');
            $table->dropForeign(['size_id']);
            $table->dropColumn('size_id');
            $table->dropColumn('seq_no');
            $table->enum('sales', ['purchase', 'rent'])->after('product_id')->nullable();
            $table->enum('step', ['1', '2'])->after('product_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('add_ons', function (Blueprint $table) {
            $table->dropColumn('sales');
            $table->dropColumn('step');
            $table->integer('seq_no');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')
                ->references('id')
                ->on('colors');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')
                ->references('id')
                ->on('sizes');

        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeningBalancesTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fiscal_year');
            $table->unsignedBigInteger('account_head');
            $table->foreign('account_head')->references('id')->on('account_sub_head_items')->onUpdate('cascade')->onDelete('restrict');
            $table->double('dr_amount')->nullable();
            $table->double('cr_amount')->nullable();
            $this->default($table);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opening_balances');
    }
}

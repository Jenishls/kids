<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

            $table->unsignedBigInteger('acct_id')->nullable();
            $table->foreign('acct_id')->references('id')->on('accounts')->onUpdate('cascade');

            $table->string('table')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();

            $table->unsignedInteger('reference_no')->nullable();
            $table->enum('payment_type', ['Dr', 'Cr'])->nullable();
            $table->string('currency')->nullable();
            $table->string('roe')->nullable();
            $table->double('amount')->nullable();
            $table->string('remarks')->nullable();

            $table->unsignedBigInteger('bill_id')->nullable();
            $table->foreign('bill_id')->references('id')->on('bills')->onUpdate('cascade');

            $table->date('ledger_date')->nullable();

            $table->unsignedBigInteger('account_head')->nullable();
            $table->foreign('account_head')->references('id')->on('account_sub_head_items')->onUpdate('cascade');

            $table->unsignedBigInteger('account_sub_head_items')->nullable();
            $table->foreign('account_sub_head_items')->references('id')->on('account_sub_head_items')->onUpdate('cascade');
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
        Schema::dropIfExists('ledgers');
    }
}

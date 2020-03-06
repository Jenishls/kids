<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalTransactionsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_head')->nullable();
            $table->foreign('account_head')->references('id')->on('account_sub_head_items')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('journal_id');
            $table->foreign('journal_id')->references('id')->on('journals')->onUpdate('cascade')->onDelete('restrict');
            $table->double('dr')->nullable();
            $table->double('cr')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('journal_transactions');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table')->nullable();
            $table->integer('table_id')->nullable();

            $table->string('bill_title', 100)->nullable();
            $table->date('bill_date')->nullable();
            $table->string('bill_no', 100)->nullable();
            $table->string('currency')->nullable();
            $table->double('roe')->nullable();
            $table->double('amount')->nullable();
            $table->text('description')->nullable();
            $table->string('status', 50)->nullable();

            $table->unsignedBigInteger('account_head')->nullable();
            $table->foreign('account_head')->references('id')->on('account_heads')->onUpdate('cascade');

            $table->string('files')->nullable();
            $table->string('remarks')->nullable();

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('bills');
        Schema::enableForeignKeyConstraints();
    }
}

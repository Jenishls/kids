<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankMastersTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('restrict');
            $table->string('name', 50)->nullable();
            $table->string('account_number', 30)->nullable();
            $table->string('account_name', 30)->nullable();
            $table->string('account_type')->nullable();
            $table->date('opened_date')->nullable();
            $table->string('branch')->nullable();
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
        Schema::dropIfExists('bank_masters');
    }
}

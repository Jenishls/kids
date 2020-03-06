<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quote_number')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->string('supplier_type')->nullable();
            $table->dateTime('released_date')->nullable();
            $table->dateTime('delivery_date')->nullable();
            $table->unsignedBigInteger('requested_id')->nullable();
            $table->unsignedBigInteger('approved_id')->nullable();
            $table->string('status')->nullable();
            $table->string('mail_to')->nullable();            
            $table->foreign('supplier_id')->references('id')->on('companies');
            $table->foreign('requested_id')->references('id')->on('companies');
            $table->foreign('approved_id')->references('id')->on('companies');
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
        Schema::dropIfExists('quotes');
        Schema::enableForeignKeyConstraints();
    }
}

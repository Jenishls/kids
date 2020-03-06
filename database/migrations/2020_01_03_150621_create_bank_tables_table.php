<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTablesTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bank_master_id');
            $table->foreign('bank_master_id')
                ->references('id')->on('bank_masters')
                ->onUpdate('cascade')->onDelete('restrict');

            $table->string('table')->nullable();
            $table->string('table_id')->nullable();
            $table->text('description')->nullable();
            $table->text('source')->nullable();
            $table->double('dr')->nullable();
            $table->double('cr')->nullable();
            $table->string('cheque_no', 25)->nullable();

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
        Schema::dropIfExists('bank_tables');
        Schema::enableForeignKeyConstraints();
    }
}

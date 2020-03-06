<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxMastersTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tax_name')->nullable();
            $table->string('tax_code')->unique()->nullable();
            $table->enum('type', ['flat', 'percentage']);
            $table->double('value')->nullable();
            $table->boolean('is_employee')->nullable();
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
        Schema::dropIfExists('tax_masters');
    }
}

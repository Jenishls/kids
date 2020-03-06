<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPoliciesTable extends Migration
{
    use App\Traits\DefaultFields;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_policies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('table');
            $table->unsignedInteger('table_id');
            $table->string('name')->nullable();
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
        Schema::dropIfExists('product_policies');
    }
}

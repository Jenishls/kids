<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountSubHeadsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_sub_heads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_head_id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $this->default($table);
            $table->foreign('account_head_id')->references('id')->on('account_heads');
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
        Schema::dropIfExists('account_sub_heads');
    }
}

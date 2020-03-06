<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountSubHeadItemsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_sub_head_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBiginteger('account_head_id');
            $table->unsignedBigInteger('account_sub_head_id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_system')->default(false);
            $this->default($table);
            $table->foreign('account_head_id')->references('id')->on('account_heads');
            $table->foreign('account_sub_head_id')->references('id')->on('account_sub_heads');
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
        Schema::dropIfExists('account_sub_head_items');
    }
}

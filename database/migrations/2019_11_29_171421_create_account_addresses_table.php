<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountAddressesTable extends Migration
{
    use App\Traits\DefaultFields;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')
                ->references('id')
                ->on('accounts');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->foreign('contact_id')
                ->references('id')
                ->on('contacts');
            $table->string('title')->nullable();
            $table->boolean('is_head_office')->nullable();
            $table->boolean('is_default')->default(0);
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
        Schema::dropIfExists('account_addresses');
    }
}

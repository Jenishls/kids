<?php

use App\Traits\DefaultFields;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerPaymentProfilesTable extends Migration
{
    use DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_payment_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onUpdate('cascade')->onDelete('restrict');

            $table->bigInteger('profile_id');
            $table->bigInteger('payment_id');
            $table->string('card');
            $table->string('name_per_card')->nullable();
            $table->string('card_no');
            $table->date('expiry');
            $table->float('amount')->nullable();

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
        Schema::dropIfExists('customer_payment_profiles');
    }
}

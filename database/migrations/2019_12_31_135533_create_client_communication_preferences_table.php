<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientCommunicationPreferencesTable extends Migration
{
     use App\Traits\DefaultFields;
               
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_communication_preferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
            ->references('id')
            ->on('clients');
            $table->unsignedBigInteger('comm_preference_id');
            $table->foreign('comm_preference_id')
            ->references('id')
            ->on('communication_preferences');
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
        Schema::dropIfExists('client_communication_preferences');
    }
}

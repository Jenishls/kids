<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveCommPreferenceTableForeignContraintFromClientCommunicationPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_communication_preferences', function (Blueprint $table) {
            $table->dropForeign('client_communication_preferences_comm_preference_id_foreign');
            $table->foreign('comm_preference_id')
            ->references('id')
            ->on('lookups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_communication_preferences', function (Blueprint $table) {
            $table->dropForeign('client_communication_preferences_comm_preference_id_foreign');
            $table->foreign('comm_preference_id')
            ->references('id')
            ->on('communication_preferences');
            
        });
    }
}

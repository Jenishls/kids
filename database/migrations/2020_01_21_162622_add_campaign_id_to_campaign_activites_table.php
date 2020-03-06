<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampaignIdToCampaignActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_activities', function (Blueprint $table) {
            $table->unsignedBigInteger('campaign_id')->after('id')->nullable();
            $table->foreign('campaign_id')
                ->references('id')
                ->on('campaigns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaign_activities', function (Blueprint $table) {
            $table->dropForeign('campaign_activities_campaign_id_foreign');
            $table->dropColumn('campaign_id');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToCampaignActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaign_activities', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('template_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
            $table->dropForeign('campaign_activities_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}

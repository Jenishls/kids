<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignActivitiesTable extends Migration
{
    use App\Traits\defaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('budget')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
            $table->string('type')->nullable();
            $table->unsignedBigInteger('mailing_list_id')->nullable();
            $table->foreign('mailing_list_id')
                ->references('id')
                ->on('activity_mailing_lists');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->foreign('template_id')
                ->references('id')
                ->on('activity_templates');
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
        Schema::dropIfExists('campaign_activities');
    }
}

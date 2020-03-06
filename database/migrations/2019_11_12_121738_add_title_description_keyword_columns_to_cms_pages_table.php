<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleDescriptionKeywordColumnsToCmsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_pages', function (Blueprint $table) {
            $table->text('site_title')->nullable()->after('target');
            $table->longText('site_keyword')->nullable()->after('site_title');
            $table->longText('site_description')->nullable()->after('site_keyword');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_pages', function (Blueprint $table) {
            $table->dropColumn('site_description');
            $table->dropColumn('site_keyword');
            $table->dropColumn('site_title');
        });
    }
}

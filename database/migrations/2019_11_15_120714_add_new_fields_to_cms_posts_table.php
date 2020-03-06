<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToCmsPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_posts', function (Blueprint $table) {
            $table->text('title')->change();
            $table->unsignedBigInteger('page_id')->nullable()->change();
            $table->string('type')->nullable()->after('id');
            $table->text('sub_title')->nullable()->after('title');
            $table->longText('short_description')->nullable()->after('content');
            $table->longText('description')->nullable()->after('content');
            $table->unsignedBigInteger('component_id')->nullable()->after('page_id');
            $table->integer('seq_no')->nullable();
            $table->string('link_url')->nullable();
            $table->string('category')->nullable()->after('comments');

            $table->foreign('component_id')->references('id')->on('cms_components')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_posts', function (Blueprint $table) {
            $table->dropForeign(['component_id']);
            $table->dropColumn('category');
            $table->dropColumn('link_url');
            $table->dropColumn('seq_no');
            $table->dropColumn('component_id');
            $table->dropColumn('description');
            $table->dropColumn('short_description');
            $table->dropColumn('sub_title');
            $table->dropColumn('type');
            $table->unsignedBigInteger('page_id')->nullable(false)->change();
            $table->string('title')->change();
        });
    }
}

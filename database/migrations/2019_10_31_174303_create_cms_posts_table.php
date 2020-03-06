<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsPostsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_id');
            $table->string('title');
            $table->longtext('highlight')->nullable();
            $table->longText('content')->nullable();
            $table->string('post_image')->nullable();
            $table->bigInteger('likes')->nullable();
            $table->bigInteger('comments')->nullable();

            $this->default($table);

            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('cms_pages')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('cms_posts');
        Schema::enableForeignKeyConstraints();
    }
}

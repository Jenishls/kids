<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqRepliesTable extends Migration
{
    use App\Traits\DefaultFields;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('faq_id');
            $table->foreign('faq_id')
                ->references('id')
                ->on('faqs');
            $table->longText('answer');
            $table->unsignedInteger('parent_id')->nullable();
            $table->boolean('is_child')->nullable();
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
        Schema::dropIfExists('faq_replies');
    }
}

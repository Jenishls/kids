<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTableExtrasStreetLevelsAndAddForeignKeyReferenceToQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::rename('extras_street_levels', 'extra_options');
        Schema::table('extra_options', function (Blueprint $table) {
            $table->string('label')->nullable();
            $table->unsignedBigInteger('question_id')->nullable();
            $table->integer('seq')->nullable();
            $table->foreign('question_id')->references('id')->on('extra_questions')->onUpdate('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('extra_options', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
            $table->dropColumn('question_id');
            $table->dropColumn('label');
            $table->dropColumn('seq');
        });
        Schema::rename('extra_options', 'extras_street_levels');
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');

            $table->enum('salutation', ['Mr', 'Ms', 'Mrs', 'Other']);
            $table->string('first_name', 40);
            $table->string('middle_name', 40)->nullable();
            $table->string('last_name', 40)->nullable();
            $table->string('home_phone_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('office_phone_no')->nullable();
            $table->string('office_email')->nullable();
            $table->string('personal_email')->nullable();
            $table->string('other_email')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('sex')->nullable();
            $table->string('marital_status')->nullable();
            $table->date('ann_date')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('race')->nullable();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('members');
        Schema::enableForeignKeyConstraints();
    }
}

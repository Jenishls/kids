<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEmailsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->string('email')->nullable();
            $table->string('email_from')->nullable();
            $table->string('server')->nullable();
            $table->string('password')->nullable();
            $table->string('mail_type')->nullable();
            $table->boolean('auth')->default(0);
            $table->boolean('is_ssl')->default(0);
            $table->boolean('is_tls')->default(0);
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
        Schema::dropIfExists('user_emails');
    }
}

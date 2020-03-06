<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    use App\Traits\DefaultFields;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->nullable();
            $table->dateTime('estd_date')->nullable();
            $table->string('ownership')->nullable();
            $table->string('account_code')->nullable();
            $table->string('industry')->nullable();
            $table->text('short_desc')->nullable();
            $table->string('url')->nullable();
            $table->string('reference')->nullable();
            $table->string('credit_terms')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('is_default')->default(0);
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
        Schema::dropIfExists('accounts');
    }
}

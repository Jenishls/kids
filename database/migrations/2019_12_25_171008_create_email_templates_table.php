<?php

use App\Traits\DefaultFields;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTemplatesTable extends Migration
{
    use DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section')->nullable();
            $table->string('temp_type')->nullable();
            $table->string('temp_name');
            $table->index('temp_name');
            $table->longText('temp_html')->nullable();
            $table->longText('temp_json')->nullable();
            $table->longText('temp_instruction')->nullable();
            $this->default($table, 1);
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
        Schema::dropIfExists('email_templates');
    }
}

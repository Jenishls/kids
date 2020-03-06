<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('c_name');
            $table->string('url')->nullable();
            $table->date('start_date');
            $table->string('status');
            $table->text('company_info')->nullable();
            $table->text('company_desc')->nullable();
            $table->string('industry')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('type')->nullable();
            $table->boolean('is_default')->default(0);
            $table->boolean('is_system')->default(0);
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
        Schema::dropIfExists('companies');
    }
}

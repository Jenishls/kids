<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionLookupsTable extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_lookups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('section_lookups');
    }
}

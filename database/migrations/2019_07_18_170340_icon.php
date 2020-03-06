<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Icon extends Migration
{
    use App\Traits\DefaultFields;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icon', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('icon_group');
        $table->string('icon_name');
        $table->string('icon_class');
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
        Schema::table('icon', function (Blueprint $table) {
            $table->dropColumn('icon');
        });
    }
}

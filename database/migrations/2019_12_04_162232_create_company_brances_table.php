<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyBrancesTable extends Migration
{
    use App\Traits\DefaultFields;
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_brances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_no');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')
                ->references('id')
                ->on('addresses');
            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')
                ->references('id')
                ->on('contacts');
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
        Schema::dropIfExists('company_brances');
    }
}

<?php

use App\Traits\DB\EnumMappingTrait;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateDeliveryByInOrdersTable extends Migration
{
    use EnumMappingTrait;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->registerEnumWithDoctrine();
        Schema::table('orders', function (Blueprint $table) {
            $table->text('delivery_by')->change();
            $table->text('pickup_by')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->registerEnumWithDoctrine();
        Schema::table('orders', function (Blueprint $table) {
            $table->string('delivery_by')->change();
            $table->string('pickup_by')->change();
        });
    }

   

}

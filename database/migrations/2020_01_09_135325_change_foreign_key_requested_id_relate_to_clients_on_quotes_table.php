<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ChangeForeignKeyRequestedIdRelateToClientsOnQuotesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		$keys = DB::table('information_schema.REFERENTIAL_CONSTRAINTS')->select('constraint_name as key')
			->where('constraint_schema', 'db_crates')
			->where('table_name', 'quotes')
			->get(['key'])->pluck('key')->all();

		if (in_array('quotes_requested_id_foreign', $keys)) {
			Schema::table('quotes', function (Blueprint $table) {
				$table->dropForeign('quotes_requested_id_foreign');
			});
		}
		DB::statement('set FOREIGN_KEY_CHECKS = 0;');
		DB::table('quote_items')->truncate();
		DB::table('quotes')->truncate();
		DB::statement('set FOREIGN_KEY_CHECKS = 1;');

		Schema::table('quotes', function (Blueprint $table) {
			$table->foreign('requested_id')->references('id')->on('clients')->onUpdate('cascade')->change();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('quotes', function (Blueprint $table) {
			$table->dropForeign('quotes_requested_id_foreign');
		});
		Schema::table('quotes', function (Blueprint $table) {
			$table->foreign('requested_id')->references('id')->on('companies')->onUpdate('cascade')->change();
		});
	}
}

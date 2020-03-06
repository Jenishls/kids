<?php

namespace App\Http\Controllers\Report;

use App\Model\ReportLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportRawSQLController extends BaseReportController {
	public function rawSQL(Request $request) {
		$rawQuery = $request->input('raw_query');
		$queryArr = explode(' ', trim($rawQuery));
		$queryType = trim($queryArr[0]);
		if (strtolower($queryType) === 'select') {
			$data = DB::select($rawQuery);
			//check if there is data or not
			if (empty($data)) {
				return response(['message' => 'No data for given query'], 500);
			} else {
				$field = array_keys((array) $data[0]);

				$data = $this->mapDB(array_flip($field), $data);

				$data['table'] = 'SQL Report';

				$data['request']['Query'] = $rawQuery;

				if ($fileName = $this->generate($request->input('report_type'), $field, $data, 'sql-raw', 'landscape')) {
					ReportLog::create([
						'report_type' => 'general',
						'report_name' => 'sql-raw',
						'file_name' => $fileName,
						'query' => $rawQuery,
						'userc_id' => Auth::id(),
					]);
				}

				return response(['message' => 'Report Generated Successfully'], 200);
			}
		} else {
			return response(['message' => 'Please Insert Valid Select Query'], 500);
		}
	}
}

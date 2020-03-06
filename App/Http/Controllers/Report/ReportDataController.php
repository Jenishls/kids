<?php

namespace App\Http\Controllers\Report;

use App\Model\Product;
use App\Model\ReportLog;
use App\Repo\Models\ReportLogRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportDataController extends BaseReportController
{
    public function datatable(Request $request, ReportLogRepo $reportLogRepo)
    {
        return $reportLogRepo->getTableData($request);
    }

    public function destroy($report, ReportLogRepo $reportLogRepo)
    {
        $reportLogRepo->softDelete($report);
        return ['message' => 'Report Successfully Deleted'];
    }

    public function productList(Request $request)
    {
        $query = Product::query()->whereBetween('created_at', $this->formatDateRange($request->dateRange));
        $products = $query->get(['id', 'code', 'name']);

        $fields = [
            'id' => 'Product ID',
            'code' => 'Product Code',
            'name' => 'Product Name',
        ];

        $data = $this->mapDB($fields, $products);

        foreach ($request->only('dateRange') as $key => $value) {
            $data['request'][$key] = $value;
        }
        $data['table'] = 'Product List Report';

        if ($file = $this->generate($request->input('report_type'), $fields, $data, 'product-list')) {
            ReportLog::create([
                'report_type' => 'general',
                'report_name' => 'product-list',
                'file_name' => $file,
                'query' => $this->toSql($query),
                'userc_id' => Auth::id(),
            ]);
            return response([
                'message' => 'Report Successfully Generated',
            ]);
        }
        return response([
            'message' => 'Report Failed To Generate',
        ], 500);
    }
}

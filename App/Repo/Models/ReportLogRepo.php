<?php
namespace App\Repo\Models;

use App\Lib\Filter\ReportLogFilter;
use App\Repo\BaseRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportLogRepo extends BaseRepo
{
    public function getTableData(Request $request)
    {
        $this->execute(function ($query, $request) {
            $query->select([
                'report_logs.*',
                DB::raw('users.name'),
            ]);

            $query->leftJoin('users', 'users.id', 'report_logs.userc_id');

            $filter = new ReportLogFilter($request, $query);
            $filter->notDeleted('report_logs');
        }, $request);

        return $this->paginate();
    }
}

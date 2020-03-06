<?php
namespace App\Lib\Filter;

use App\Filter\Filter;

class ReportLogFilter extends Filter
{
    public function dateRange($dateRange)
    {
        if (!$dateRange) {
            return;
        }
        $this->builder->whereBetween('report_logs.created_at', formatDateRange($dateRange));
    }

    public function name($reportName)
    {
        if (!$reportName) {
            return;
        }
        $this->builder->where('report_name', $reportName);
    }
}

<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Exporter\Exporter;
use App\Model\Account;
use Illuminate\Support\Facades\DB;

class AccountExportController extends AbstractExporterController
{
    public function export(Request $request, $type){

        $fields = ['company_name','ownership','industry','estd_date','account_code','credit_terms','url','reference','created_at'];
        $tableFields = ['company_name','ownership','industry','estd_date','account_code','credit_terms','url','reference','created_at'];
        $data = Account::get();
        $mappedArrayData = $this->mapper($tableFields, $data);  
        $exporterInstance = $this->reportType($type, $fields, $mappedArrayData);
        $exporter = new Exporter($exporterInstance);
        $filename = $exporter->export();
        return response()->download($filename)->deleteFileAfterSend(true);

    }   

    public function getPrintBlade() : string{
        return "account-print";
    }
}

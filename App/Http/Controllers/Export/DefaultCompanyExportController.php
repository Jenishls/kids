<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Exporter\Exporter;
use App\Model\DefaultCompany;
use Illuminate\Support\Facades\DB;

class DefaultCompanyExportController extends AbstractExporterController
{
    public function export(Request $request, $type){

        $fields = array(  'Property',  'Value', 'Created At');
        $tableFields = array('property', 'value', 'created_at');
        $data = DefaultCompany::get();
        $mappedArrayData = $this->mapper($tableFields, $data);  

        $exporterInstance = $this->reportType($type, $fields, $mappedArrayData);
        $exporter = new Exporter($exporterInstance);
        $filename = $exporter->export();
        return response()->download($filename)->deleteFileAfterSend(true);

    }   

    public function getPrintBlade() : string{
        return "default-company-print";
    }

}

<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Exporter\Exporter;
use App\Model\SiteSetting;
use Illuminate\Support\Facades\DB;

class SiteSettingExportController extends AbstractExporterController
{
    public function export(Request $request, $type){

        $fields = array(  'Code',  'Value', 'Description', 'Created At');
        $tableFields = array('code', 'value', 'description', 'created_at');
        $data = SiteSetting::get();
        $mappedArrayData = $this->mapper($tableFields, $data);  

        $exporterInstance = $this->reportType($type, $fields, $mappedArrayData);
        $exporter = new Exporter($exporterInstance);
        $filename = $exporter->export();
        return response()->download($filename)->deleteFileAfterSend(true);

    }   

    public function getPrintBlade() : string{
        return "site-setting-print";
    }

}

<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Exporter\Exporter;
use App\Model\ZipCode;
use Illuminate\Support\Facades\DB;

class ZipExportController extends AbstractExporterController
{
    public function export(Request $request, $type){

        $fields = array('City',  'County', 'State', 'Zip', 'Price', 'Created At');
        $tableFields = array('city', 'county', 'state', 'zipcode', 'price', 'created_at');
        $data = ZipCode::where('is_deleted',0)->get();
        $mappedArrayData = $this->mapper($tableFields, $data);  
        $exporterInstance = $this->reportType($type, $fields, $mappedArrayData);
        $exporter = new Exporter($exporterInstance);
        $filename = $exporter->export();
        return response()->download($filename)->deleteFileAfterSend(true);

    }   

    public function getPrintBlade() : string{
        return "location-zip-print";
    }

}
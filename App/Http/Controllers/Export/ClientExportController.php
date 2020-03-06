<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Exporter\Exporter;
use App\Model\Client;
use Illuminate\Support\Facades\DB;

class ClientExportController extends AbstractExporterController
{
    public function export(Request $request, $type){

        $fields = array('First Name',  'Last Name', 'Phone', 'Email');
        $tableFields = array('fname', 'lname', 'phone_no', 'email');
        $data = Client::where('is_deleted',0)->get();
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
<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Exporter\Exporter;
use App\Model\Coupon;
use Illuminate\Support\Facades\DB;

class CouponExportController extends AbstractExporterController
{
    public function export(Request $request, $type){

        $fields = array('Name', 'Code', 'Description', 'Start Date','End Date', 'Minimum Price', 'Usage','Amount','Type', 'Created At');
        $tableFields = array('name', 'code', 'description','start_date', 'end_date','min_price', 'usage','value','type' , 'created_at');
        $data = Coupon::get();
        $mappedArrayData = $this->mapper($tableFields, $data);  

        $exporterInstance = $this->reportType($type, $fields, $mappedArrayData);
        $exporter = new Exporter($exporterInstance);
        $filename = $exporter->export();
        return response()->download($filename)->deleteFileAfterSend(true);

    }   

    public function getPrintBlade() : string{
        return "coupon-print";
    }

}
<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Exporter\Exporter;
use App\Model\Order;
use Illuminate\Support\Facades\DB;

class OrderDetailExportController extends AbstractExporterController
{
    public function export(Request $request, $type)
    {
        $order = Order::find($request->order);
        $fields = ['Created Date','Order Number','Package Name','Customer Name','Phone','Total Invoice ($)','Moving Date','Return Date','Status'];
        $tableFields = ['created_at','order_no','package_name','customer','phone_no','amount','delivery_date','return_date','order_status'];
        $exporterInstance = $this->reportType($type, $fields, $order);
        $exporter = new Exporter($exporterInstance);
        $filename = $exporter->export();
        if($request->pdf){
            return $filename;
        }
        return response()->download($filename)->deleteFileAfterSend(true);

    }   

    public function getPrintBlade() : string{
        return "order-detail-print";
    }
}

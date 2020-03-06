<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Exporter\Exporter;
use App\Model\Order;
use Illuminate\Support\Facades\DB;

class OrderExportController extends AbstractExporterController
{
    public function export(Request $request, $type)
    {
        $fields = ['Created Date','Order Number','Package Name','Customer Name','Phone','Total Invoice ($)','Moving Date','Return Date','Status'];
        $tableFields = ['created_at','order_no','package_name','customer','phone_no','amount','delivery_date','return_date','order_status'];
        $data = Order::join('clients as c', 'c.id', 'orders.client_id')
                        ->join('package_prices as p', 'p.id', 'orders.package_id')
                        ->select(DB::raw('CONCAT(fname, " ", lname) AS customer'), 'c.phone_no','p.package_name','orders.*')
                        ->get();
        $mappedArrayData = $this->mapper($tableFields, $data);  
        $exporterInstance = $this->reportType($type, $fields, $mappedArrayData);
        $exporter = new Exporter($exporterInstance);
        $filename = $exporter->export();
        return response()->download($filename)->deleteFileAfterSend(true);

    }   

    public function getPrintBlade() : string{
        return "order-print";
    }
}

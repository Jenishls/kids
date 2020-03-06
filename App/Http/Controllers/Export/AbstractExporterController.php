<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use App\Lib\Exporter\{PDFExporter, CSVExporter};


abstract class AbstractExporterController extends Controller
{

    public abstract function export(Request $request, $type);

    public abstract function getPrintBlade() :string;

    function mapper($mapField, $data)
    {
        $dataArr = [];
        foreach ($data as $d) {
            $singleRow = [];
            foreach ($mapField as $map) {
                if (array_key_exists($map, $d));
                $singleRow[$map] = $d->$map;
            }
            array_push($dataArr, $singleRow);
        }
        return $dataArr;
    }

    public function reportType($type, $fields, $data, $filename = false, $mode = false){
        switch($type){
            case "pdf" : return new PDFExporter($data, $fields, $this->getPrintBlade(),$filename?:"",$mode);
            case "csv": 
                return new CSVExporter($data, $fields, "csv"); 
                break;
            default : 
                return new CSVExporter($data, $fields, 'csv'); 
                break;
        }

    }
}

<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Lib\Exporter\CSVExporter;
use App\Lib\Exporter\JSONExporter;
use App\Lib\Exporter\PDFExporter;

class BaseReportController extends Controller
{

    public function formatDateRange($range, $format = 'Y-m-d')
    {
        $range = is_array($range) ? $range : explode('-', $range);
        $range = array_map(function ($date) use ($format) {
            return date_create($date)->format($format);
        }, $range);
        return $range;
    }

    protected static function toSql($builder)
    {
        $query = $builder->toSql();
        $params = $builder->getBindings();
        for ($i = 0, $len = count($params); $i < $len; $i++) {
            $value = $params[$i];
            if (!is_numeric($value)) {
                $value = "'$value'";
            }
            $query = preg_replace('/\?/', $value, $query, 1);
        }
        return $query;
    }

    public function generate($format, $fields, $data, $filename, $pdfFormat = null, $blade=false)
    {
        if ($format === 'csv') {
            unset($data['table']);
            return CSVExporter::arrayToCSV($fields, $data, $filename);
        }
        if ($format === 'pdf') {
            return PDFExporter::pdfExport($fields, $data, $filename, $pdfFormat, $blade);
        }
        if ($format === 'json') {
            unset($data['table'], $data['request']);
            return JSONExporter::jsonExport($data, $filename);
        }
    }

    public function mapDB($fields, $dataArr, $cb = null)
    {
        $results = [];
        $callable = is_callable($cb);

        foreach ($dataArr as $key => $data) {
            $data = (object) $data;
            foreach ($fields as $columnName => $t) {
                $value = $data->$columnName ?? null;
                if ($callable) {
                    $value = $cb($value, $key, $data);
                }
                $results[$key][$columnName] = $value;
            }
        }
        return $results;
    }
}

<?php
namespace App\Traits;

use App\Lib\Exporter\CSVExporter;
use App\Lib\Exporter\JSONExporter;
use App\Lib\Exporter\PDFExporter;

trait ReportGenerator
{

    /**
     * map data into array with additional callback
     *
     * @param array|Collection $data
     * @param array $fields
     * @param Callable $cb
     * @return array formatted data arrray
     */
    private function mapDB($data, $fields, $cb = null)
    {
        $dataArr = array();
        foreach ($data as $index => $d) {
            foreach ($fields as $field => $title) {
                $value = null;
                if (is_object($d) && isset($d->$field)) {
                    $value = $d->$field;
                } elseif (is_array($d) && isset($d[$field])) {
                    $value = $d[$field];
                }
                $value = is_callable($cb) ? $cb($value, $field, $d, $index) : $value;
                $dataArr[$index][$field] = $value;
            }
        }
        return $dataArr;
    }

    private function cleanData($data, &$fields, $mapPdf = false, $callback = null)
    {
        $dataArr = [];
        foreach ($fields as $field => &$t) {
            foreach ($data as $key => $d) {
                $d = (object) $d;
                $value = null;

                if (isset($d->$field)) {
                    $value = $d->$field;
                }

                if (preg_match('/DateRaw/', $t)) {
                } elseif (preg_match('/Date/', $t)) {
                    $value = $value ? newDate($value) : null;
                }

                if ($mapPdf && preg_match('/[=>]$/', $t)) {
                    $value .= substr($t, -1);
                }

                if (is_callable($callback)) {
                    $value = $callback($value, $field, $d);
                }

                $dataArr[$key][$field] = $value;
            }
            if (!$mapPdf && preg_match('/[=>]$/', $t)) {
                $t = substr($t, 0, -1);
            }
        }
        return $dataArr;
    }

    private function mapData($data, &$fields, $mapPdf = false)
    {
        $dataArr = [];
        foreach ($data as $key => $d) {
            foreach ($fields as $field => &$t) {
                $value = null;
                if (is_object($d) && isset($d->$field)) {
                    $value = $d->$field;
                } elseif (is_array($d) && isset($d[$field])) {
                    $value = $d[$field];
                }

                if (preg_match('/DateRaw/', $t)) {

                } elseif (preg_match('/Date/', $t)) {
                    $value = $value ? newDate($value) : null;
                }
                if ($mapPdf) {
                    if (preg_match('/[=>]$/', $t)) {
                        $value .= substr($t, -1);
                    }
                } else {
                    if (preg_match('/[=>]$/', $t)) {
                        $t = substr($t, 0, -1);
                    }
                }
                $dataArr[$key][$field] = $value;
            }
        }
        $fields = array_map(function ($t) {
            return str_replace('Raw', '', $t);
        }, $fields);
        return $dataArr;
    }

    private function generate($format, $field, $data, $fileName, $mode = '', $blade = false)
    {

        switch (strtolower($format)) {
            case 'csv':
                unset($data['table']);
                return CSVExporter::arrayToCSV($field, $data, $fileName);
                break;
            case 'json':
                unset($data['request']);
                unset($data['table']);
                return JSONExporter::jsonExport($data, $fileName);
                break;
            case 'pdf':
                return PDFExporter::pdfExport($field, $data, $fileName, $mode, $blade);
                break;
            default:
                return false;
        }
    }

    public function downloadReportFile($filename)
    {
        $path = storage_path("reports/$filename");
        if (file_exists($path)) {
            return response()->download($path)->deleteFileAfterSend(true);
        }

        abort(404);
    }
}

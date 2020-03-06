<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Exporter\Exporter;
use App\Model\Faq;
use App\Model\FaqReply;
use Illuminate\Support\Facades\DB;

class FaqExportController extends AbstractExporterController
{
    public function export(Request $request, $type){

        $fields = array('Faqs', 'Answers', 'Sequence', 'Created At');
        $tableFields = array('question', 'answer', 'seq', 'created_at');
        $data = Faq::join('faq_replies as fr', 'fr.faq_id', 'faqs.id')
        ->select('faqs.question','fr.answer', 'faqs.seq', 'faqs.created_at')
        ->where('faqs.is_deleted', 0)
        ->get();
        $mappedArrayData = $this->mapper($tableFields, $data);  
        $exporterInstance = $this->reportType($type, $fields, $mappedArrayData);
        $exporter = new Exporter($exporterInstance);
        $filename = $exporter->export();
        return response()->download($filename)->deleteFileAfterSend(true);

    }   

    public function getPrintBlade() : string{
        return "faq-print";
    }

}
<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Model\ReportTemplate;
use App\Repo\Models\ReportTemplateRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportTemplateController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
        ));

        $exists = ReportTemplate::query()->where($request->only('report_name', 'name'))->where('is_deleted', 0)->count() > 0;
        if ($exists) {
            return response(['message' => 'Template with same name already exists !'], 422);
        }

        $data = $request->only('name', 'report_name', 'data');
        $data['userc_id'] = Auth::id();
        ReportTemplate::create($data);

        return response(['message' => 'Template Successfully Created']);
    }

    public function destroy($report_template, ReportTemplateRepo $reportTemplateRepo)
    {
        $reportTemplateRepo->softDelete($report_template);

        return ['message' => 'Template Successfully Deleted'];
    }
}

<?php
namespace App\Repo\Models;

use App\Model\ReportTemplate;
use App\Repo\BaseRepo;

class ReportTemplateRepo extends BaseRepo
{
    public function entity()
    {
        return ReportTemplate::class;
    }
}

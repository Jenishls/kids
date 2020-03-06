<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lib\Exporter\Exporter;
use App\User;
use Illuminate\Support\Facades\DB;

class UserExportController extends AbstractExporterController
{
   
    public function export(Request $request, $type){

        $fields = array(  'First name',  'Last name', 'Username', 'Email', 'Mobile no.', 'Member since', 'Roles');
        $tableFields = array('first_name', 'last_name', 'name', 'email', 'mobile_no', 'created_at', 'roles');

        $data= User::join('members as m', 'm.user_id', 'users.id')
            ->select('users.name', 'm.mobile_no', 'm.first_name', 'm.middle_name', 'm.last_name','users.created_at','users.email', 
                DB::raw(
                    '(
                        select GROUP_CONCAT(roles.role_name) from roles join user_roles on user_roles.role_id = roles.id where user_roles.user_id = users.id
                    ) as roles'
                )
            )
            ->get();
        $mappedArrayData = $this->mapper($tableFields, $data);  

        $exporterInstance = $this->reportType($type, $fields, $mappedArrayData);
        $exporter = new Exporter($exporterInstance);
        $filename = $exporter->export();
        return response()->download($filename)->deleteFileAfterSend(true);

    }   

    public function getPrintBlade() : string{
        return "user-print";
    }

}

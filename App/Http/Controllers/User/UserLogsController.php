<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserLog;

class UserLogsController extends Controller
{
    public function index(Request $request)
    {
        return view(default_template() . '.pages.logs.index');
    }

    public function logData()
    {
        $logs = UserLog::with('users')->get();
        foreach ($logs as $log) {
            $log->user_name = $log->users[0]->name;
        }
        // return dd($logs);
        return response()->json($logs);
    }
}

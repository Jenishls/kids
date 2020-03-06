<?php

namespace App\Http\Controllers\Projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function index(){
        return view('support.pages.dashboard.projects.index');

    }
    
}

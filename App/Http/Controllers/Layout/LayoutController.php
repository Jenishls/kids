<?php

namespace App\Http\Controllers\Layout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LayoutController extends Controller
{
    
    public function index(){

    	 return view(default_template() . '.pages.layout.admin.index');
    }
}

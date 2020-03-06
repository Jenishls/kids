<?php

namespace App\Http\Controllers;

use App\Model\Company;
use App\Model\Template;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    protected $layout;
    protected $template;

    public function __construct()
    {
        $template = Template::where('is_active', 1)->where('is_deleted', 0)->first();
        $this->layout = $template->folder;
        // $this->layout = config('app.my_layout');
        // $template = default_template();
    }
}

<?php

namespace App\Http\Controllers\Netlify\Career;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ComponentsTrait;

class CareerController extends Controller
{
    use ComponentsTrait;
    public function index()
    {
        $components = $this->components('Career');
        $meta = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($meta);
        return view('frontend.netlify.pages.features.career', compact('components'));
    }
}

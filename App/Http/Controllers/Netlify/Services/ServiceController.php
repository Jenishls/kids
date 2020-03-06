<?php

namespace App\Http\Controllers\Netlify\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ComponentsTrait;

class ServiceController extends Controller
{
    use ComponentsTrait;
    public function index()
    {

        $components = $this->components('Services');
        $mets = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($mets);
        return view('frontend.netlify.pages.services.index', compact('components'));
    }
}

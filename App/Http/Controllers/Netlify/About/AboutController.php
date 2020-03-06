<?php

namespace App\Http\Controllers\Netlify\About;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ComponentsTrait;

class AboutController extends Controller
{
    use ComponentsTrait;
    public function index()
    {
        $components = $this->components('About Us');
        $data = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($data);
        return view('frontend.netlify.pages.features.about_us', compact('components'));
    }
    public function errorIndex()
    {
        $components = $this->components('Error');
        $data = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($data);
        return view('frontend.netlify.pages.features.error_page', compact('components'));
    }
}

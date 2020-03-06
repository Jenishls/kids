<?php

namespace App\Http\Controllers\Netlify\SingleCareer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ComponentsTrait;

class SingleCareerController extends Controller
{
    use ComponentsTrait;
    public function index()
    {
        $components = $this->components('Single Career');
        $meta = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($meta);
        return view('frontend.netlify.pages.features.single_career', compact('components'));
    }
}

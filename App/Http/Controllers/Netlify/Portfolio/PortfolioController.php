<?php

namespace App\Http\Controllers\Netlify\Portfolio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ComponentsTrait;

class PortfolioController extends Controller
{
    use ComponentsTrait;
    public function index()
    {
        $components = $this->components('Portfolio');
        $data = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($data);
        return view('frontend.netlify.pages.portfolio.index', compact('components'));
    }
}

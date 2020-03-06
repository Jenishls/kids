<?php

namespace App\Http\Controllers\Netlify\Pricing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ComponentsTrait;

class PricingController extends Controller
{
    use ComponentsTrait;
    public function index()
    {
        $components = $this->components('Pricing');
        $data = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($data);
        return view('frontend.netlify.pages.features.pricing', compact('components'));
    }
}

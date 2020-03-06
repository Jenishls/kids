<?php

namespace App\Http\Controllers\Netlify\SingleTeam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ComponentsTrait;

class SingleTeamController extends Controller
{
    use ComponentsTrait;
    public function index()
    {
        $components = $this->components('Single Team');
        $meta = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($meta);
        return view('frontend.netlify.pages.features.single_team', compact('components'));
    }
}

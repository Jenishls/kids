<?php

namespace App\Http\Controllers\Netlify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CMS\CmsMenu;
use App\Model\CMS\CmsPage;
use App\Model\CMS\CmsTemplate;
use App\Model\CMS\ComponentPage;
use App\Traits\ComponentsTrait;

class ViewController extends Controller
{
    use ComponentsTrait;
    public function index()
    {
        $components = $this->components('Home');
        $menus = $this->getMenuItems();

        // dd($components);
        $meta = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($meta);
        return view('frontend.netlify.index', compact('components', 'meta', 'menus'));
    }
    public function homeTwoIndex()
    {
        return view('frontend.netlify.pages.home.home_two');
    }
}

<?php

namespace App\Http\Controllers\Netlify\Blog;

use App\Model\CMS\CmsPage;
use Illuminate\Http\Request;
use App\Model\CMS\CmsTemplate;
use App\Model\CMS\ComponentPage;
use App\Http\Controllers\Controller;
use App\Traits\ComponentsTrait;

class BlogController extends Controller
{
    use ComponentsTrait;
    public function index()
    {
        $components = $this->components('Blog');
        $meta = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($meta);
        return view('frontend.netlify.pages.blog.index', compact('components'));
    }
}

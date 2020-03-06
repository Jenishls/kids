<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\dashboardController;
// use App\Model\Component;
use App\Model\Template;
use App\Traits\ComponentsTrait;

class TemplateController extends Controller
{
    use ComponentsTrait;
    public function index()
    {
        $templates = Template::where('is_deleted', 0)->get();
        // $components = Component::all();
        return view(default_template() . '.pages.template.index', compact('templates'));
    }

    public function pagePreview(string $template, string $page = 'Home')
    {
        if ($template === 'netlifytemp') {
            $temp = 'netlify';
        }
        if ($template === 'cratesonskates') {
            $temp = 'cratesOnSkates';
        }
        switch ($page) {
            case 'about':
                $page = 'about us';
                break;
            case 'singlecareer':
                $page = 'single career';
                break;
            case 'singleteam':
                $page = 'single team';
                break;
            default:
                $page = $page;
                break;
        }
        $c_page = ucwords($page);
        $components = $this->components($c_page);

        // $meta = $this->getMeta($components[0]->page_id);
        // dd($components);
        // $url = '/' . $template;
        $menus = $this->getMenuItems();
        return view('preview', compact('components', 'c_page', 'menus', 'temp'));
    }
}

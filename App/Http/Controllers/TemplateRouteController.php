<?php

namespace App\Http\Controllers;

use App\Traits\ComponentsTrait;
use Illuminate\Http\Request;

class TemplateRouteController extends Controller
{
    use ComponentsTrait;

    /**
     * return complete pages views using slug paramenter
     *
     * @param string $slug
     * @return void
     */
    public function index(string $slug = 'home')
    {
        // $host = request()->root();
        // $host  = url()->full();
        // dd($host);
        // $temp = request()->server()['PATH_INFO'];
        // $domain =
        $components = $this->components(ucfirst($slug));
        $menus = $this->getMenuItems();
        foreach ($menus as $menu) {
            if ($menu->name === 'Home') {
                $menu->icon_class = 'flaticon-home';
            }
            if ($menu->name === 'Services') {
                $menu->icon_class = 'flaticon-layers';
            }
            if ($menu->name === 'Portfolio') {
                $menu->icon_class = 'flaticon-photo';
            }
            if ($menu->name === 'Features') {
                $menu->icon_class = 'flaticon-settings-cogwheel';
            }
            if ($menu->name === 'Blog Page') {
                $menu->icon_class = 'flaticon-light-bulb';
            }
            if ($menu->name === 'Contact Us') {
                $menu->icon_class = 'flaticon-chat';
            }
        }
        // dd($components);
        $meta = $this->getMeta($components[0]->page_id);
        $this->setPageCookie($meta);
        $data = ['home', 'services', 'contact', 'portfolio', 'about', 'blog', 'pricing', 'career', 'singlecareer', 'singleteam', 'error'];

        if (in_array(strtolower($slug), $data)) {
            if ($slug === 'home') {
                return view('frontend.netlify.index', compact('components', 'meta', 'menus'));
            } else {
                return view('frontend.netlify.pages.' . $slug . '.index', compact('components', 'meta', 'menus'));
            }
        } else {
            abort(404);
        }
    }
}

<?php
namespace App\Traits;
use App\Model\CMS\CmsPage;
use App\Model\CMS\CmsTemplate;
use App\Model\CMS\ComponentPage;
use App\Model\Faq;
use App\Model\PackagePrice;
use App\Model\Product;

/**
 *
 */
trait ComponentsTrait
{
    public function components($page)
    {
        if ($page === 'About') {
            $page_name = 'About Us';
        } elseif ($page === 'Singlecareer') {
            $page_name = 'Single Career';
        } elseif ($page === 'Singleteam') {
            $page_name = 'Single Team';
        } else {
            $page_name = $page;
        }
        // dd(request()->server()['PATH_INFO']);
        // $temp = request()->server()['PATH_INFO']; //commented by rakesh results error on server as path_info doesnt set (refactored)
        // $base_url = explode('/', $temp)[1];
        // dd($base_url);
        // dd($base_url);
        $base_url = array_first(explode("/", request()->path()));
        $template = CmsTemplate::where('url', '/' . $base_url)->first();
        if (!$template) {
            $template = CmsTemplate::where('url', '/')->first();
        }else{

        }
        $cms_page = CmsPage::where([
            'template_id' => $template->id,
            'page_name' => $page_name,
            'is_deleted' => 0
        ])->first();

        // if the slug is not matching then cms page is home
        if(!$cms_page){
            $cms_page = CmsPage::where([
                'template_id' => $template->id,
                'page_name' => "home",
                'is_deleted' => 0
            ])->first();
        }

        $page_components = ComponentPage::where('page_id', $cms_page->id)->orderBy('seq_no')->get();
        // $page_components = ComponentPage::where('component_pages.page_id', $page->id)
        // ->join('cms_posts', 'cms_posts.component_id', 'component_pages.component_id')->get();
        // dd($page_components);
        $components = [];
        foreach ($page_components as $key => $page_component) {
            $component = $page_component->getComponent();
            $blade_file = strtolower(implode('_', explode(' ', $component->name)));
            $component->file_name = $blade_file;
            $component->page_id = $cms_page->id;
            array_push($components, $component);
        }
        return $components;
    }
    public function getMeta($page_id)
    {
        $page = CmsPage::find($page_id);
        return $page;
    }
    public function setPageCookie($meta)
    {
        $lifespan = 5184000;
        $lifespan = time() + $lifespan;
        $cookie_data = [
            'page_title' => ucwords($meta->site_title),
            'page_keyword' => $meta->site_keyword,
            'page_desc' => $meta->site_description,
        ];
        setcookie('page_meta', json_encode($cookie_data), $lifespan, '/netlifytemp');
    }
    public function getMenuItems()
    {
        // $temp = request()->server()['PATH_INFO']; // commented for educational purposes don't uncommment
        // $base_url = explode('/', $temp)[1];
        // dd($base_url);
        $base_url = array_first(explode("/", request()->path()));
        $template = CmsTemplate::where('url', '/' . $base_url)->first();
        if (!$template) {
            $template = CmsTemplate::where('url', '/')->first();
        }
        return $template->cmsMenus;
    }

    public function getData($slug){

            switch ($slug) {
                case 'residential':
                    $data = PackagePrice::select("package_prices.*")->where([
                        "package_type_id" => 1,
                        "is_deleted" => 0
                    ])
                        ->get();
                    return $data;
                    break;

                case 'office':
                    $data = PackagePrice::select("package_prices.*")->where([
                        "package_type_id" => 2,
                        "is_deleted" => 0
                    ])
                    ->get();
                    return $data;
                    break;

                case 'products':
                    $data = Product::select("products.*")->where("is_deleted",0)->get();
                    return $data;
                    break;
                case 'products_recommanded':
                    $data = Product::select("products.*")->whereHas('addon', function($q){
                        return $q->step1();
                    })->where("is_deleted",0)->limit(3)->get();
                    return $data;
                    break;
                case 'products_additional':
                    $data = Product::select("products.*")->whereHas('addon', function($q){
                        return $q->step2();
                    })->where("is_deleted",0)->limit(3)->get();
                    return $data;
                    break;
                case 'faq': 
                    $data = Faq::isFaq()->with('faqReplies')->where('is_active', 1)->where('is_deleted', 0)->orderBy('seq')->get();
                    return $data;
                default:
                    # code...
                    break;
            }

    }
}

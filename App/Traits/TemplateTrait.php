<?php

namespace App\Traits;

use App\Model\CMS\CmsPage;
use App\Model\Template;
use App\Model\CMS\CmsTemplate;

trait TemplateTrait
{
    public function activeTemplate($id)
    {
        // $temp = request()->server()['PATH_INFO'];
        // $base_url = explode('/', $temp)[1];
        // // dd($base_url);
        $template = CmsTemplate::where('id', $id)->first();
        // $template = CmsTemplate::where('is_active', 1)->where('is_deleted', 0)->first();
        $layout = $template->name;
        return $layout;
        // $this->layout = config('app.my_layout');

    }


    public function getPageLinkedTo($menu)
    {
        $page = CmsPage::where('target', $menu->route)->first();
        return $page->name;
    }
}

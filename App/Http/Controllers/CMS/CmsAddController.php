<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CMS\CmsComponent;
use App\Model\CMS\CmsFile;
use App\Model\CMS\CmsMenu;
use App\Model\CMS\CmsPage;
use App\Model\Cms\CmsPost;
use App\Model\CMS\CmsTemplate;
use App\Model\CMS\ComponentPage;
use App\Model\Icon;
use App\Model\CMS\MenuPage;

class CmsAddController extends CmsController
{
    /**
     * CRUD modals
     *
     * @param string $entity
     * @param integer $id
     * @return view
     */
    public function getAddModal(string $entity, int $id = NULL)
    {
        if ($entity === 'template') {
            return $this->addCmsTempModal();
        }
        if ($entity === 'page') {
            return $this->addCmsPageModal($id);
        }
        if ($entity === 'menu') {
            return $this->addCmsMenuModal($id);
        }
        if ($entity === 'menupage') {
            return $this->addCmsMenuPageModal($id);
        }
        if ($entity === 'blog') {
            return $this->addCmsBlogModal($id);
        }
        if ($entity === 'post') {
            return $this->addCmsPostModal($id);
        }
        if ($entity === 'component') {
            return $this->addComponentModal($id);
        }
        if ($entity === 'newcomponent') {
            return $this->addNewComponentModal($id);
        }
    }

    /**
     * CRUD Operations
     *
     * @param Request $request
     * @param string $entity
     * @param integer $id
     * @return void
     */
    public function cmsAdd(Request $request, string $entity, int $id = NULL)
    {
        if ($entity === 'template') {
            return $this->addCmsTemplate($request);
        }
        if ($entity === 'page') {
            return $this->addCmsPage($request, $id);
        }
        if ($entity === 'menu') {
            return $this->addCmsMenu($request, $id);
        }
        if ($entity === 'menupage') {
            return $this->addCmsMenuPage($request, $id);
        }

        if ($entity === 'blog') {
            return $this->addCmsBlog($request, $id);
        }
        if ($entity === 'post') {
            return $this->addCmsPost($request, $id);
        }
        if ($entity === 'component') {
            return $this->addPageComponent($request, $id);
        }
    }

    public function addCmsTempModal()
    {
        return view(default_template() . '.pages.template.modal.add-template-modal');
    }

    /**
     * Add New CMS Template
     *
     * @param Request $request
     * @return action
     */
    public function addCmsTemplate($request)
    {
        $rules = validation_value('addTemplateForm');
        $this->validate($request, $rules);
        $formdata = $request->except(['_token', 'builder', 'file']);
        if ($request->builder['layout']['toolbar']['display'] === 'true') {
            $formdata['is_active'] = 1;
        } else {
            $formdata['is_active'] = 0;
        }
        $defaults = $this->defaultAddFields();
        $data = array_merge($formdata, $defaults);
        CmsTemplate::insert($data);
        $temp = CmsTemplate::latest()->first();
        if ($request->has('file')) {
            $image = upload_file($request, '/CMS/preview');
            CmsFile::create(array(
                'type' => 'preview',
                'table_name' => 'cms_templates',
                'table_id' => $temp->id,
                'file_name' => $image,
            ));
        }
        // $folder = strtolower($temp->name);
        // if (is_dir(resource_path("views\\frontend\\{$folder}"))) {
        //     dd("Already exists");
        // } else {
        //     mkdir(resource_path("views\\frontend\\{$folder}"), 0777, true);
        // }
        return $this->index();
    }


    public function addCmsPageModal($id)
    {
        $template = CmsTemplate::find($id);
        $cms_menus = CmsMenu::where('is_deleted', 0)->get();
        return view(default_template() . '.pages.template.modal.add-cms-page-modal', compact('template', 'cms_menus'));
    }

    /**
     * Add new CMS Page
     *
     * @param Request $request
     * @return void
     */
    public function addCmsPage($request, $id)
    {
        $rules = validation_value('add_cms_page_form');
        $this->validate($request, $rules);
        $formdata = $request->except(['_token']);
        $defaults = $this->defaultAddFields();
        $data = array_merge($formdata, $defaults, ['template_id' => $id]);
        CmsPage::insert($data);
        // return $this->index();
    }


    public function addCmsMenuModal($id)
    {
        $icons = Icon::where('is_deleted', 0)->get();
        $template = CmsTemplate::find($id);
        $cms_menus = CmsMenu::where('is_deleted', 0)->get();
        $cms_pages = CmsPage::where('template_id', $id)->where('is_deleted', 0)->get();
        return view(default_template() . '.pages.template.modal.add-cms-menu-modal', compact('cms_menus', 'template', 'icons', 'cms_pages'));
    }

    public function addCmsMenuPageModal($menu_id)
    {
        $pages = CmsPage::where('is_deleted', 0)->get();
        return view(default_template() . '.pages.template.modal.add-cms-menu-page-modal', compact('pages', 'menu_id'));
    }

    public function addCmsMenuPage($request, $id)
    {
        // dd($request->all());
        $menu = CmsMenu::find($id);
        MenuPage::create([
            'menu_id' => $id,
            'page_id' => $request->page_id,
            'seq_no' => $request->seq_no
        ]);

        return $this->getCmsMenus($menu->template_id);
    }
    /**
     * Add new CMS Menu
     *
     * @param Request $request
     * @return void
     */
    public function addCmsMenu($request, $id)
    {
        // dd($request->all());
        $rules = validation_value('add_cms_menu_form');
        $this->validate($request, $rules);
        $formdata = $request->except(['_token', 'builder', 'parent_id']);
        $defaults = $this->defaultAddFields();
        if ($request->builder['layout']['toolbar']['display'] === 'true') {
            $formdata['is_parent'] = 1;
            $formdata['parent_id'] = null;
        } else {
            $formdata['is_parent'] = 0;
            $formdata['parent_id'] = (int) $request->parent_id;
        }
        $data = array_merge($formdata, $defaults, ['template_id' => $id]);
        CmsMenu::insert($data);
        $menu = CmsMenu::latest()->first();
        if ($menu->is_parent === 1) return $this->getCmsMenus($menu->id);
        return $this->getCmsMenus($menu->parent_id);
    }


    public function addCmsBlogModal($id)
    {
        // $template = CmsTemplate::find($id);
        // return view(default_template() . '.pages.template.modal.cms');
    }

    public function addCmsPostModal($id)
    {

        $component = CmsComponent::find($id);
        return view(default_template() . '.pages.template.modal.add-cms-post-modal', compact('component'));
    }

    public function addComponentModal($id)
    {
        $cms_page = CmsPage::find($id);
        $temp = CmsTemplate::find($cms_page->template_id);
        $name = strtolower($temp->name);
        // dd($temp);
        $components = [];
        if (is_dir(base_path("resources\\views\\frontend\\{$name}\\components"))) {

            $comps = scandir(base_path("resources\\views\\frontend\\{$name}\\components"));

            foreach ($comps as $key => $value) {
                if (strpos($value, '.blade.php')) {
                    $no_ext = explode('.', $value)[0];
                    $sep = explode('_', $no_ext);
                    $file_name = implode(' ', $sep);
                    $components[$key] = $file_name;
                }
            }
        }
        return view(default_template() . '.pages.template.modal.add-cms-component-modal', compact('cms_page', 'components'));
    }

    public function addNewComponentModal($id)
    {
        return view(default_template() . '.pages.template.modal.add-new-component-modal');
    }


    public function addCmsBlog($request, $id)
    {
        # code...
    }

    /**
     * Add new Cms Post
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function addCmsPost($request, $id)
    {
        $rules = validation_value('addPostForm');
        $this->validate($request, $rules);
        $arr = [
            'created_at' => date('Y-m-d H:i:s'),
            'userc_id' => auth()->id() ?: 0,
            'component_id' => $id,
        ];
        $fields = $request->except(['_token', 'file']);
        $data = array_merge($fields, $arr);
        $post = CmsPost::create($data);
        if ($request->has('file')) {
            $postfile = upload_file($request, 'CMS/post');
            CmsFile::create([
                'type' => 'post',
                'table_name' => 'cms_posts',
                'table_id' => $post->id,
                'file_name' => $postfile,
                "userc_id" => auth()->id(),
                "created_at" => date('Y-m-d H:i:s'),
            ]);
        }
        return $this->getCmsPosts($id);
    }

    /**
     * Add new Component to cms_components table
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function addCmsComponent($request, $id)
    {
        // dd($request->all(), $id);
    }

    /**
     * Link cms_component with cms_page
     *
     * @param integer $page_id
     * @param string $component_id
     * @return void
     */
    public function addPageComponent($request, $id)
    {
        $components = CmsComponent::where('is_deleted', 0)->get();
        if ($components->contains('name', ucwords($request->name))) {
            // dd('old');
            $component = CmsComponent::where('name', $request->name)->first();
            ComponentPage::create([
                'component_id' => $component->id,
                'page_id' => $id,
                'seq_no' => $request->seq_no
            ]);
        } else {
            // dd('new');
            $page = CmsPage::find($id);

            $component = CmsComponent::create([
                'created_at' => date('Y-m-d H:i:s'),
                'userc_id' => auth()->id() ?: 0,
                'template_id' => $page->template_id,
                'location' => 'home',
                'name' => $request->name
            ]);
            ComponentPage::create([
                'component_id' => $component->id,
                'page_id' => $page->id,
                'seq_no' => $request->seq_no
            ]);
        }
        return $this->getComponents($id);
    }
}

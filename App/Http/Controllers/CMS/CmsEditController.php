<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CMS\CmsMenu;
use App\Model\CMS\CmsPage;
use App\Model\Cms\CmsPost;
use App\Model\CMS\CmsTemplate;
use App\Model\CMS\CmsFile;
use App\Model\CMS\ComponentPage;

class CmsEditController extends CmsController
{

    /**
     * CRUD Modals
     *
     * @param string $entity
     * @param integer $id
     * @return view
     */
    public function getEditModal(string $entity, int $id = NULL)
    {
        if ($entity === 'template') {
            return $this->editCmsTempModal($id);
        }
        if ($entity === 'page') {
            return $this->editCmsPageModal($id);
        }
        if ($entity === 'menu') {
            return $this->editCmsMenuModal($id);
        }
        if ($entity === 'blog') {
            return $this->editCmsBlogModal($id);
        }
        if ($entity === 'post') {
            return $this->editCmsPostModal($id);
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
    public function cmsUpdate(Request $request, string $entity, int $id)
    {
        if ($entity === 'template') {
            return $this->editCmsTemplate($request, $id);
        }
        if ($entity === 'page') {
            return $this->editCmsPage($request, $id);
        }
        if ($entity === 'menu') {
            return $this->editCmsMenu($request, $id);
        }
        if ($entity === 'blog') {
            return $this->editCmsBlog($request, $id);
        }
        if ($entity === 'post') {
            return $this->editCmsPost($request, $id);
        }
    }

    public function editCmsTempModal($id)
    {
        $cms_temp = CmsTemplate::find($id);
        return view(default_template() . '.pages.template.modal.edit-template-modal', compact('cms_temp'));
    }

    /**
     * Edit CMS Template
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function editCmsTemplate($request, $id)
    {
        $rules = validation_value('editTemplateForm');
        $this->validate($request, $rules);
        $temp = CmsTemplate::find($id);
        $upd_data = $request->except(['_token', 'builder', 'file']);
        if ($request->builder['layout']['toolbar']['display'] === 'true') {
            $upd_data['is_active'] = 1;
        } else {
            $upd_data['is_active'] = 0;
        }
        $def = $this->defaultUpdateFields();
        $data = array_merge($upd_data, $def);
        $temp->update($data);
        if ($request->has('file')) {
            $image = upload_file($request, '/CMS/preview');
            if ($temp->preview) {
                $temp->preview->update(array(
                    'file_name' => $image,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'useru_id' => auth()->id() ?: 0,
                ));
            } else {
                CmsFile::create(array(
                    'type' => 'preview',
                    'table_name' => 'cms_templates',
                    'table_id' => $temp->id,
                    'file_name' => $image,
                ));
            }
        }
        return $this->index();
    }

    public function editCmsPageModal($id)
    {
        $cms_page = CmsPage::find($id);
        return view(default_template() . '.pages.template.modal.edit-cms-page-modal', compact('cms_page'));
    }

    /**
     * Edit CMS Page
     *
     * @param Request $request
     * @param integer $page
     * @return void
     */
    public function editCmsPage($request, $page)
    {
        $rules = validation_value('edit_cms_page_form');
        $this->validate($request, $rules);
        $cms_page = CmsPage::find($page);
        $upd_data = $request->all();
        $def = $this->defaultUpdateFields();
        $data = array_merge($upd_data, $def);
        $updated_cms_page = CmsPage::where('id', $page)->update($data);
        return $this->getActiveCmsTemp($cms_page->template_id);
    }

    public function editCmsMenuModal($id)
    {
        $cms_menus = CmsMenu::where('is_deleted', 0)->get();
        $cms_menu = CmsMenu::find($id);
        $cms_pages = CmsPage::where('template_id', $cms_menu->template_id)->where('is_deleted', 0)->get();
        return view(default_template() . '.pages.template.modal.edit-cms-menu-modal', compact('cms_menu', 'cms_menus', 'cms_pages'));
    }


    /**
     * Edit CMS Menu
     *
     * @param Request $request
     * @param integer $menu
     * @return void
     */
    public function editCmsMenu($request, $id)
    {
        $rules = validation_value('add_cms_menu_form');
        $this->validate($request, $rules);
        $menu = CmsMenu::find($id);
        $upd_data = $request->except(['_token', 'builder']);
        if ($request->builder['layout']['toolbar']['display'] === 'true') {
            $upd_data['is_parent'] = 1;
            $upd_data['parent_id'] = null;
        } else {
            $upd_data['is_parent'] = 0;
            $upd_data['parent_id'] = (int) $request->parent_id;
        }
        $def = $this->defaultUpdateFields();
        $data = array_merge($upd_data, $def);
        $menu->update($data);
        return $this->getCmsMenus($menu->id);
    }

    public function editCmsBlogModal($id)
    {
        $cms_blog = CmsBlog::find($id);
        return view(default_template() . '.pages.template.modal.edit-cms-blog-modal', compact('cms_blog'));
    }

    public function editCmsPostModal($id)
    {
        $post = CmsPost::find($id);
        return view(default_template() . '.pages.template.modal.edit-cms-post-modal', compact('post'));
    }

    public function editCmsBlog($request, $id)
    {
        # code...
    }

    /**
     * Update selected CMS Post
     *
     * @param Request $request
     * @param integer $id
     * @return void
     */
    public function editCmsPost($request, $id)
    {
        $rules = validation_value('editPostForm');
        $this->validate($request, $rules);
        $post = CmsPost::find($id);
        $fields = $request->except(['_token', 'file']);
        $arr = [
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
        ];
        $data = array_merge($fields, $arr);
        $post->update($data);
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
        return $this->getCmsPosts($post->component_id);
    }

    public function changeImage(Request $request)
    {
        // 
    }

    public function cmsDelete(string $entity, int $id)
    {
        if ($entity === 'template') {
            return $this->deleteCmsTemplate($id);
        }
        if ($entity === 'page') {
            return $this->deleteCmsPage($id);
        }
        if ($entity === 'menu') {
            return $this->deleteCmsMenu($id);
        }
        if ($entity === 'post') {
            return $this->deleteCmsPost($id);
        }
        if ($entity === 'component') {
            $comp = ComponentPage::find($id);
            $page_id = $comp->page_id;
            $comp->delete();
            return $this->getComponents($page_id);
        }
    }

    /**
     * SoftDelete CMS Template
     *
     * @param integer $template
     * @return void
     */
    public function deleteCmsTemplate($id)
    {
        $temp = CmsTemplate::find($id);
        $def = $this->defaultDeleteFields();
        $temp->update($def);
        return $this->index();
    }

    /**
     * SoftDelete CMS Page
     *
     * @param integer $page
     * @return void
     */
    public function deleteCmsPage($id)
    {
        $page = CmsPage::find($id);
        $def = $this->defaultDeleteFields();
        $page->update($def);
        return $this->getActiveCmsTemp($page->template_id);
    }

    /**
     * SoftDelete CMS Menu
     *
     * @param integer $menu
     * @return void
     */
    public function deleteCmsMenu($id)
    {
        $menu = CmsMenu::find($id);
        $def = $this->defaultDeleteFields();
        $menu->update($def);
    }

    /**
     * SoftDelete CMS Post
     *
     * @param integer $id
     * @return void
     */
    public function deleteCmsPost($id)
    {
        $post = CmsPost::find($id);
        $def = $this->defaultDeleteFields();
        $post->update($def);
        return $this->getCmsPosts($post->component_id);
    }


    /**
     * Change Sequence Number of cms page/post on drag and drop
     *
     * @param Request $request
     * @return void
     */
    public function dragComponent(Request $request, string $component)
    {
        if ($component === 'component') {
            $page = 0;
            foreach ($request->data as $key => $row) {
                $comp = ComponentPage::find((int) $row['comp_id']);
                $comp->seq_no = $key + 1;
                $comp->save();
                $page = $comp->page_id;
            }
            return $this->getComponents($page);
        }
        if ($component === 'post') {
            $parent_component = 0;
            foreach ($request->data as $key => $row) {
                $comp = CmsPost::find((int) $row['post_id']);
                $comp->seq_no = $key + 1;
                $comp->save();
                $parent_component = $comp->component_id;
            }
            return $this->getCmsPosts($parent_component);
        }
        if ($component === 'menu') {
            $parent_component = 0;
            foreach ($request->data as $key => $row) {
                $menu = CmsMenu::find((int) $row['menu_id']);
                $menu->seq_no = $key + 1;
                $menu->save();
                $parent_component = $menu->parent_id;
            }
            return $this->getCmsMenus($parent_component);
        }
    }
}

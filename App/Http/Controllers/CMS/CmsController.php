<?php

namespace App\Http\Controllers\CMS;

use App\Model\CMS\CmsMenu;
use App\Model\CMS\CmsPage;
use Illuminate\Http\Request;
use App\Model\CMS\CmsTemplate;
use App\Http\Controllers\Controller;
use App\Model\Blog\Blog;
use App\Model\CMS\CmsComponent;
use App\Model\Cms\CmsPost;
use App\Model\CMS\ComponentPage;
use App\Traits\TemplateTrait;
use App\User;
use UsersTableSeeder;


class CmsController extends Controller
{
    use TemplateTrait;
    public function index()
    {

        // dd(request()->route()->uri);
        $templates = $this->getCmsTemplate();
        return view(default_template() . '.pages.template.index', compact('templates'));
    }


    public function getCmsTemplate()
    {
        $cms_temp = CmsTemplate::where('is_deleted', 0)->get();
        return $cms_temp;
    }

    /**
     * Get components for each page
     *
     * @param string $section
     * @param integer $temp_id
     * @return void
     */
    public function getComponents(int $page_id)
    {
        $page = CmsPage::find($page_id);
        $components = ComponentPage::where('page_id', $page_id)->orderBy('seq_no', 'asc')->get();
        foreach ($components as $component) {
            $c = $component->getComponent();
            $component->name = $c->name;
        }

        return view(default_template() . '.pages.template.inc.cms-component-view', compact('components', 'page', 'page_id'));
    }



    /**
     * Return View of cms components of selected template
     *
     * @param string $section
     * @param integer $template
     * @return view
     */
    public function getCmsSection(string $section, int $template = NULL)
    {
        if ($section === 'company') {
            return $this->getCmsCompany($template);
        }
        if ($section === 'pages') {
            return $this->getCmsPages($template);
        }
        if ($section === 'menus') {
            return $this->getCmsMenus($template);
        }
        if ($section === 'blogs') {
            return $this->getCmsBlogs($template);
        }
        if ($section === 'posts') {
            return $this->getCmsPosts($template);
        }
    }

    /**
     * Returns datatable for components
     *
     * @param Request $request
     * @param string $section
     * @param integer $template
     * @return jsondata
     */
    public function getSectionTable(Request $request, string $section, int $template)
    {
        if ($section === 'page') {
            $model = CmsPage::where('is_deleted', 0)->where('template_id', $template);
            return $this->pageTable($request, $template, $model);
        }
        if ($section === 'menu') {
            $model = CmsMenu::where('is_deleted', 0)->where('template_id', $template);
            return $this->menuTable($request, $template, $model);
        }
        if ($section === 'post') {
            $model = CmsPost::leftjoin('cms_pages', 'cms_posts.page_id', 'cms_pages.id')
                ->where('cms_posts.is_deleted', 0)
                ->select('cms_posts.*')
                ->where('cms_pages.template_id', $template);
            return $this->postTable($request, $template, $model);
        }
    }


    /**
     * Datatable with filter/search
     *
     * @param Request $request
     * @param Builder $model
     * @return data
     */
    public function filterData($request, $model)
    {
        $sort = '';
        $field = '';
        $find = [];
        $pages = $request->pagination['page'];
        if ($request->input('query')) {
            $search = $request->input('query');
            foreach ($search as $key => $value) {
                $find['row'] = $key;
                $find['value'] = $value;
            }
        }
        if ($request->sort) {
            $sort = $request->sort['sort'];
            $field = $request->sort['field'];
        }
        $data = $model
            ->when($request->sort, function ($q, $sort) {
                return $q->orderBy($sort['field'], $sort['sort']);
            })
            ->when($request->query, function ($s_query) use ($find) {
                if (count($find) > 0 && $find['value'] != '')
                    return $s_query->where($find['row'], 'like', '%' . $find['value'] . '%');
            })
            ->get();
        return $data;
    }


    public function postTable($request, $template, $model)
    {

        $cms_posts = $this->filterData($request, $model);
        return response()->json($cms_posts);
    }

    public function getCmsCompany($template)
    {
        return view(default_template() . '.pages.template.inc.cms-company-details-view', compact('template'));
    }

    public function getCmsPages($template)
    {
        return view(default_template() . '.pages.template.inc.cms-pages-view', compact('template'));
    }


    public function pageTable($request, $template, $model)
    {
        $cms_pages = $this->filterData($request, $model);
        return response()->json($cms_pages);
    }


    public function getCmsMenus($menu_id)
    {
        $menu = CmsMenu::find($menu_id);
        $page = CmsPage::where('target', $menu->route)->first();
        $temp = CmsTemplate::find($menu->template_id);
        return view(default_template() . '.pages.template.inc.cms-menus-view', compact('menu', 'temp'));
    }


    public function menuTable($request, $template, $model)
    {
        $cms_menus = $this->filterData($request, $model);
        return response()->json($cms_menus);
    }


    public function getActiveCmsTemp(int $id)
    {
        $all_components = CmsComponent::where('template_id', $id)->where('is_deleted', 0)->orderBy('name')->get();
        // dd($all_components);
        // $templates = CmsTemplate::all();
        // foreach ($templates as $t) {
        //     $t->is_active = 0;
        //     $t->save();
        // }
        $cms_temp = CmsTemplate::find($id);
        // $cms_temp->is_active = 1;
        // $cms_temp->save();
        $components = $this->getAllComponents($cms_temp);
        return view(default_template() . '.pages.template.inc.template-view', compact('cms_temp', 'components', 'all_components'));
    }

    public function getCmsBlogs($template)
    {
        $blogs = Blog::where('is_deleted', 0)->get();
        foreach ($blogs as $key => $blog) {
            $blog->created_by = User::where('id', $blog->table_id)->first();
        }
        return view(default_template() . '.pages.template.inc.cms-blogs-view', compact('template', 'blogs'));
    }

    public function getCmsPosts($component_id)
    {
        $component = CmsComponent::find($component_id);
        $cms_posts = CmsPost::where('component_id', $component_id)->where('is_deleted', 0)->orderBy('seq_no')->get();
        return view(default_template() . '.pages.template.inc.cms-posts-view', compact('cms_posts', 'component'));
    }


    /**
     * Get all components of current active template
     *
     * @return void
     */
    public function getAllComponents($template)
    {
        $pages = $template->cmsPages;
        $components = [];
        foreach ($pages as $key => $page) {
            $page_comps = ComponentPage::where('page_id', $page->id)->get();
            foreach ($page_comps as $k => $component) {
                $comp = CmsComponent::find($component->component_id);
                $comp->seq_no = $component->seq_no;
                array_push($components, $comp);
            }
        }
        return $components;
    }




    public function defaultAddFields()
    {
        return [
            'userc_id' => auth()->id(),
            'created_at' => date('Y-m-d H:i:s'),
        ];
    }


    public function defaultUpdateFields()
    {
        return [
            'updated_at' => date('Y-m-d H:i:s'),
            'useru_id' => auth()->id() ?: 0,
        ];
    }


    public function defaultDeleteFields()
    {
        return [
            'is_deleted' => 1,
            'deleted_at' => date('Y-m-d H:i:s'),
            'userd_id' => auth()->id() ?: 0,
        ];
    }
}

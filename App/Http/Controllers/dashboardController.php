<?php

namespace App\Http\Controllers;

use Exception;
use App\Model\Template;
use App\Model\DefaultCompany;
use App\Model\{Menu, Icon};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Traits\TemplateTrait;

class dashboardController extends Controller
{
    // use TemplateTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns dashboard view
     */
    public function dashboard()
    {
        $company_name = DefaultCompany::where('property', 'company_name')->first();
        $templates = Template::where('is_deleted', 0)->get();
        $parentMenus = Menu::with('subMenus')->where('name','<>','dashboard')->where('is_deleted', 0)->where('parent_id', NULL)->orderBy('seq')->get();
        $icons = Icon::where('is_deleted', 0)->get();
        $sideBarMenu =  Menu::where('is_sidebar', 1)->where('is_deleted',0)->orderBy('seq')->get();
        // dd($this->template());

        $dashboard_route ="/admin/order";
        return view(default_template() . ".pages.dashboard.dashboardPlain.dashboard", compact('parentMenus', 'icons', 'templates', 'company_name','sideBarMenu', 'dashboard_route'));
    }

    /**
     * Change default template view(theme)
     *
     * @param integer $id
     * @return action
     */
    public function changeTemplate(int $id)
    {
        $def_temp = Template::where('is_active', 1)->first();
        $def_temp->is_active = 0;
        $def_temp->save();
        $new_def = Template::find($id);
        $new_def->is_active = 1;
        $new_def->save();
        return $this->dashboard();
    }



    public function addTemplateModal()
    {
        return view(default_template() . '.pages.dashboard.inc.add-template-modal');
    }
    /**
     * New template
     *
     * @param Request $request
     * @return void
     */
    public function addNewTemplate(Request $request)
    {
        $temps = Template::where('is_deleted', 0)->get();
        $temp_folders = [];
        foreach ($temps as $key => $temp) {
            array_push($temp_folders, $temp->folder);
        }
        $path = base_path() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $request->folder;
        if (!$request->folder || !is_dir($path)) {
            throw new Exception("No such directory found inside views.", 404);
        } elseif (in_array($request->folder, $temp_folders)) {
            throw new Exception("Template already exists.", 409);
        } else {
            dd(auth()->id());
            $template = Template::create(array(
                'temp_name' => $request->temp_name,
                'folder' => $request->folder,
                'site_name' => $request->site_name ?: NULL,
                'is_active' => 0,
                'userc_id' => auth()->id() ?: 0,
                'created_at' => date('Y-m-d H:i:s'),
            ));
            if ($request->has('file')) {
                $preview = upload_file($request, '/template/previews');
                File::create(array(
                    'type' => 'preview',
                    'table_name' => 'templates',
                    'table_id' => $template->id,
                    'file_name' => $preview,
                ));
            }
        }
    }


    public function deleteTemplate(int $id)
    {
        $template = Template::find($id);
        $template->is_deleted = 1;
        $template->save();
    }
}

<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailTemplateRequest;
// use App\Models\DefaultTemplate;
use App\Model\EmailTemplate;
use App\Repo\EmailTemplateRepo;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{
    /**
     * @var null
     */
    private static $repo = null;
    /**
     * @var string
     */
    private $clayout = '';
    private $layout = 'supportNew';

    public function __construct()
    {
        $this->clayout = $this->layout . '.pages.email_template';
    }

    /**
     * @param $model
     * @return EmailTemplateRepo|null
     */
    private static function getInstance($model)
    {
        if (self::$repo == null) {
            self::$repo = new EmailTemplateRepo($model);
        }

        return self::$repo;
    }

    public function index()
    {
        $emailTemplates = EmailTemplate::where('is_deleted', false);
        $templates = $emailTemplates->get();
        $temp = $emailTemplates->orderBy('created_at', 'asc')->first();
        return view($this->clayout . '.index', compact('templates', 'temp'));
    }

    public function create()
    {
        return view($this->clayout . '.modal.add');
    }

    public function store(EmailTemplateRequest $request)
    {
        $res = self::getInstance('EmailTemplate')->saveUpdate($request->except('files', '_token', 'temp_code'));

        if ($res) {
            return $this->response("Email Template Added SuccessFully", "view", 200);
        } else {
            return $this->response("Can't add Email Template", 'view', 422);
        }
    }

    /**
     * @param $id
     * @return bool|string
     */
    public function getTemplate($id)
    {
        if ($template = self::getInstance('Client')->findById($id)) {
            // $fields = explode(',', $template->temp_json);
            return view($this->layout . '.pages.email_template.includes.single_template', compact('template'));
        }
        return 'false';
        // return view($this->layout . '.pages.client.modal.edit', compact('client'));
    }
    public function getTempCode()
    {
        $clients = self::getInstance('EmailTemplate')->select();
        return $this->responseLookup($clients, ["temp_code"]);
    }

    public function getTempJson($val)
    {
        $temp = EmailTemplate::where('temp_code', $val)->first();
        return $temp->temp_json;
    }
    /**
     * @param Request $request
     * @return mixed
     */
    public function getAll(Request $request)
    {
        $data = self::getInstance('EmailTemplate')->selectDataTable($request);
        return $data;
    }

    /**
     * Update Form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(EmailTemplate $template)
    {
        $fields = explode(',', $template->temp_json);
        return view($this->clayout . '.modal.edit', compact('template', 'fields'));
    }

    public function update(EmailTemplateRequest $request, EmailTemplate $template)
    {
        
        $res = self::getInstance($template)->saveUpdate($request->except('files', 'temp_code'));

        if ($res) {
            return $this->response("Email Template Updated SuccessFully", "view", 200);
        } else {
            return $this->response("Can't Update Email Template", 'view', 422);
        }
    }

    /**
     * @param EmailTemplate $template
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete(EmailTemplate $template)
    {
        return view($this->clayout . '.modal.delete', compact('template'));
    }

    /**
     * @param EmailTemplate $template
     * @return $this|\Illuminate\Http\JsonResponse
     */
    public function destroy(EmailTemplate $template)
    {
        $res = self::getInstance($template)->softDelete($template->id);

        if ($res) {
            return $this->response("Template deleted successFully", "view", 200);
        } else {
            return $this->response("Can't delete Template", 'view', 422);
        }

    }

    public function getTemplateName($query = false)
    {
        if ($query) {
            $templates = EmailTemplate::where('temp_type', 'LIKE', $query . '%')->where('is_deleted', false)->orderBy('temp_name', 'asc')->get();
        } else {
            $templates = EmailTemplate::where('is_deleted', false)->orderBy('temp_name', 'asc')->get();
        }
        return $this->responseLookup($templates, ["temp_name"]);
    }

    public function response($message, $type, $status = 200)
    {
        return response(compact('message', 'type'), $status);
    }
}

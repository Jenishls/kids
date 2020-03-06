<?php

namespace App\Http\Middleware\Template;

use App\Model\Template;
use App\Template\TemplateManager;
use Closure;

class TempWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $template = $this->resolveTemplate(
            $request->template ?: session()->get('template')
        );
        $this->registerTemplate($template);
        return $next($request);
    }

    protected function registerTemplate($template)
    {
        app(TemplateManager::class)->setTemplate($template);
        session()->put('template', $template->id);
    }

    protected function resolveTemplate($id)
    {

        $template = Template::find($id);
        return $template;
    }
}

<?php

namespace App\Template;

class TemplateManager
{
    protected $template;

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getTemplate()
    {

        return $this->template;
    }
}

<?php

use Illuminate\Database\Eloquent\Model;

class TemplateObserver
{
    protected $template;

    public function __construct(Model $template)
    {
        $this->template = $template;
    }
    public function creating(Model $model)
    {
        $foreignKey = $this->template->getForeignKey();
        if (!isset($model->{$foreignKey})) {
            $model->setAttribute($foreignKey, $this->template->id);
        }
    }
}
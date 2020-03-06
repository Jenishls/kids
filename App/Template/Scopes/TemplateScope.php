<?php

namespace App\Template\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TemplateScope implements Scope
{
    protected $template;

    public function __construct(Model $template)
    {
        $this->template = $template;
    }

    public function apply(Builder $builder, Model $model)
    {
        return $builder->where($this->template->getForeignKey(), '=', $this->template->id);
    }
}

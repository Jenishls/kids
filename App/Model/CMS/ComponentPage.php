<?php

namespace App\Model\CMS;

use Illuminate\Database\Eloquent\Model;

class ComponentPage extends Model
{
    protected $guarded = [];
    public function components()
    { }

    public function getComponent()
    {
        $component = CmsComponent::find($this->component_id);
        return $component;
    }
}

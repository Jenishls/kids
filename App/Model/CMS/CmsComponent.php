<?php

namespace App\Model\CMS;

use App\Model\Cms\CmsPost;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TemplateTrait;

class CmsComponent extends Model
{
    use TemplateTrait;
    protected $guarded = [];

    public function getNameAttribute($value)
    {
        // $value = implode('_', explode(' ', $value));
        return ucwords($value);
    }

    public function getLocationAttribute($value)
    {
        // dd($this);
        // return $this->activeTemplate() . '/components/' . $value . '/index';
        return 'frontend.' . $this->activeTemplate($this->template_id) . '.components.';
        // $this->attributes['location'] = $activeTemplate . '/components/' . $value . '/index';
    }

    public function posts()
    {
        return $this->hasMany(CmsPost::class, 'component_id', 'id')->where('is_deleted', 0);
    }
}

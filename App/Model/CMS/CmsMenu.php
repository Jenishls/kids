<?php

namespace App\Model\CMS;

use App\Model\CMS\CmsPage;
use App\Scopes\IsDeletedScope;
use Illuminate\Database\Eloquent\Model;

class CmsMenu extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new IsDeletedScope);
    }

    public function components()
    {
        return $this->hasMany(CmsComponent::class, 'menu_id', 'id');
    }

    public function childMenus()
    {
        return $this->hasMany(static::class, 'parent_id', 'id')->orderBy('seq_no');
    }

    // public function linkedTo()
    // {
    //     dd($this);
    //     if ($this->route) {
    //         $page = CmsPage::where('target', $this->route)->first();
    //         return $page->name;
    //     }
    //     // return false;
    // }
}

<?php

namespace App\Model\CMS;

use App\Model\CMS\CmsFile;
use App\Model\CMS\CmsMenu;
use App\Model\CMS\CmsPage;
use App\Scopes\IsDeletedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class CmsTemplate extends Model
{
    protected $guarded = [];
    protected $table = 'cms_templates';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new IsDeletedScope);
        Relation::morphMap([
            'cms_templates' => static::class
        ]);
    }

    public function cmsPages()
    {
        return $this->hasMany(CmsPage::class, 'template_id', 'id');
    }

    public function cmsMenus()
    {
        return $this->hasMany(CmsMenu::class, 'template_id', 'id')->where('is_deleted', 0)->where('is_parent', 1)->orderBy('seq_no');
    }

    public function previewImage()
    {
        return $this->preview->file_name;
    }
    public function preview()
    {
        // return $this->morphOne(CmsFile::class, 'table', 'table_name', 'table_id', 'id')->where('type', 'preview');
        return $this->morphOne(CmsFile::class, 'fileable', 'table_name', 'table_id');
    }

    public function getAllComponents()
    {
        $components = [];
        $pages = $this->cmsPages();
        foreach ($pages as $page) {
            dd($page);
            $page_comps = ComponentPage::where('page_id', $page->id)->get();
            foreach ($page_comps as $component) {
                $comp = CmsComponent::find($component->component_id);
                $components[$comp];
            }
        }
        return $components;
    }
}

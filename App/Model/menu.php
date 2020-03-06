<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    protected $table = 'menus';

    protected $guarded = [];

    // use SoftDeletes;

    public function subMenus()
    {
    	return $this->hasMany(Menu::class,'parent_id','id')
    	->where('is_deleted',0)
    	->orderBy('seq');
    }

     public function subMenusIcons()
    {
    	return $this->hasMany('App\Model\icon', 'id', 'icon_id');
    }
}

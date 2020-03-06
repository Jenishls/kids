<?php

namespace App\Model;

use App\Model\Lookup\Lookup;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public function members(){
        return $this->belongsToMany(User::class,"project_members")->withTimestamps();
    }

    public function projectType(){
        return $this->belongsTo(Lookup::class,'project_type',"id");
    }

    public function company(){
        return $this->belongsTo(Company::class,"company_id");
    }

    public function projectManager(){
        return $this->belongsTo(User::class,"project_manager");
    }

    public function files(){
        return $this->morphMany(File::class,'table',"table_name");
    }
}

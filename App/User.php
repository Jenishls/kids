<?php

namespace App;

use App\Model\Cart;
use App\Model\File;
use App\Model\Role;
use App\Model\Client;
use App\Model\CustomerPaymentProfile;
use App\Model\Member;
use App\Model\UserEmail;
use App\Model\Membership;
use App\Model\Permission;
use App\Model\Project;
use App\Model\Task;
use App\Model\Taskboard;
use App\Traits\StoreAudit;
use App\Traits\RolePermissionTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, RolePermissionTrait, StoreAudit;
    protected static $recordEvents = ['created', 'updated'];
    protected $appends = ['full_name'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = [
        'roles', 'member.addresses', 'memberships'
    ];

    protected $table = 'users';

    /**
     * Create Api Token
     *
     * @return User
     */
    public function createApiToken() : User{
        $this->update([
            'api_token' => Str::random(60)
        ]);
        return $this;
    }

    /**
     * Validate the user provided api token
     *
     * @param [type] $token
     * @return boolean
     */
    public function validateApiToken($token) : bool{
        return $this->user->api_token === $token;
    }

    public function getfullNameAttribute()
    {

        return $this->fullname();
    }

    public function taskboard() {
        return $this->belongsToMany(Taskboard::class)->withTimestamps();
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function tasks(){
        return $this->belongsToMany(Task::class,"task_assignees")->withTimestamps();
    }
    public function projects(){
        return $this->belongsToMany(Project::class,"project_members")->withTimestamps();
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions', 'user_id', 'permission_id')->wherePivot('is_deleted', 0);
    }

    public function fullname()
    {
        return $this->member ? $this->member->fullname() : ($this->client ? $this->client->fullname() : '');
    }

    public function member()
    {
        return $this->hasOne(Member::class);
    }
    
    public function emailSetting()
    {
        return $this->hasOne(UserEmail::class);
    }

    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    public function profilePicture()
    {
        return $this->morphOne(File::class, 'fileable', 'table_name', 'table_id')->where('type', 'profile');
    }

    public function dp()
    {
        return $this->morphOne(File::class, 'table', 'table_name', 'table_id', 'id')->where('type', 'profile');
    }
    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function hasPermission($page, $action) {
        $allPermissions = session('permissions');
        foreach($allPermissions as $permission) {
            if(!in_array(strtolower($page), array_map('strtolower', $permission['page']))) {
                continue;
            }
            $actions = array_map('strtolower', explode('|', $permission['action']));
            if(!in_array(strtolower($action), $actions)) {
                continue;
            }
            return true;
        }
        return false;
    }

    public function carts(){
        return $this->hasMany(Cart::class)->with('inventory', 'inventory.cartProduct')->where('is_active', 1);
    }


}

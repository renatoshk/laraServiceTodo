<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Roles extends Model
{
    use HasFactory;
    protected $fillable = [

    ];
    public function permissionRoles()
    {
        return $this->hasManyThrough('App\Models\Permissions', 'permission_role', 'role_id', 'permission_id');
    }
    public function permissionRole(){
        return $this->hasMany('App\Models\RoleHasPermissions','role_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            'App\Models\Roles',
            'model_has_roles',
            'model_id',
            'role_id'
        );
    }
    //roles relation
    public function role()
    {
        return $this->belongsToMany('App\Models\Roles', 'model_has_roles', 'model_id', 'role_id');
    }
    //permission relation
    public function permissionUsers()
    {
        return $this->hasManyThrough('App\Models\Permissions', 'model_has_permissions', 'model_id', 'permission_id');
    }
    public function permissionUser(){
        return $this->hasMany('App\Models\ModelHasPermissions','model_id','id');
    }
    public function roleUser()
    {
        return $this->hasOne('App\Models\ModelHasRoles')->orderBy('id','desc');
    }
}

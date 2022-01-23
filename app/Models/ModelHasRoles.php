<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasRoles extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasMany('App\Models\User','model_id','id');
    }
    public function role()
    {
        return $this->belongsTo('App\Models\Roles','role_id','id');
    }
}

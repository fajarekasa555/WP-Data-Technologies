<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'module_feature_action_method_id',
        'name'
    ];

    public function actionMethod()
    {
        return $this->belongsTo(ModuleFeatureActionMethod::class, 'module_feature_action_method_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}

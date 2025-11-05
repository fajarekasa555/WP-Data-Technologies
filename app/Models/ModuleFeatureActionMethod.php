<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleFeatureActionMethod extends Model
{
    protected $fillable = [
        'module_feature_id',
        'action',
        'slug'
    ];

    public function feature()
    {
        return $this->belongsTo(ModuleFeature::class, 'module_feature_id');
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'module_feature_action_method_id');
    }
}

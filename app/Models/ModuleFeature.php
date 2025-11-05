<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleFeature extends Model
{
    protected $fillable = [
        'module_id',
        'name',
        'slug'
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function actionMethods()
    {
        return $this->hasMany(ModuleFeatureActionMethod::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];

    public function features()
    {
        return $this->hasMany(ModuleFeature::class);
    }

    public function applicationMenus()
    {
        return $this->hasMany(ApplicationMenu::class);
    }
}

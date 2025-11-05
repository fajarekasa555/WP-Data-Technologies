<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationMenu extends Model
{
    protected $fillable = [
        'application_id',
        'module_id',
        'feature_id',
        'name',
        'icon',
        'url',
        'order',
        'parent_id'
    ];

    // Relasi ke aplikasi
    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    // Relasi ke module
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    // Relasi ke feature
    public function feature()
    {
        return $this->belongsTo(ModuleFeature::class, 'feature_id');
    }

    // Parent/child menu
    public function children()
    {
        return $this->hasMany(ApplicationMenu::class, 'parent_id')->orderBy('order');
    }

    public function parent()
    {
        return $this->belongsTo(ApplicationMenu::class, 'parent_id');
    }
}

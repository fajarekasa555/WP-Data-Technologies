<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['name', 'code', 'description'];

    // 🔹 Relasi ke Module
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'application_modules');
    }

    // 🔹 Relasi ke Menu
    public function menus()
    {
        return $this->hasMany(ApplicationMenu::class);
    }
}

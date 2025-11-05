<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationModule extends Model
{
    protected $fillable = ['application_id', 'module_id'];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}

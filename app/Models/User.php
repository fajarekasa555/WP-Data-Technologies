<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'password'
    ];

    // Relasi ke role
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    // Cek permission user
    public function hasPermission($permissionSlug)
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('name', $permissionSlug)) {
                return true;
            }
        }
        return false;
    }

    // Cek role
    public function hasRole($roleName)
    {
        return $this->roles->contains('name', $roleName);
    }
}

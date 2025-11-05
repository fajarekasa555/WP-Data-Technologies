<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RbacSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // --- MODULES ---
        $moduleId = DB::table('modules')->insertGetId([
            'name' => 'RBAC',
            'slug' => 'rbac',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // --- FEATURES ---
        $features = [
            ['module_id' => $moduleId, 'name' => 'User Management', 'slug' => 'user_management'],
            ['module_id' => $moduleId, 'name' => 'Role Management', 'slug' => 'role_management'],
            ['module_id' => $moduleId, 'name' => 'Permission Management', 'slug' => 'permission_management'],
            ['module_id' => $moduleId, 'name' => 'Menu Management', 'slug' => 'menu_management'],
            ['module_id' => $moduleId, 'name' => 'Developer Mode', 'slug' => 'developer_mode'],
        ];

        foreach ($features as &$feature) {
            $feature['created_at'] = $now;
            $feature['updated_at'] = $now;
        }
        DB::table('module_features')->insert($features);

        $features = DB::table('module_features')->pluck('id', 'slug');

        // --- FEATURE ACTION METHODS ---
        $actions = ['view', 'create', 'edit', 'delete', 'manage'];
        $methodMap = [];

        foreach ($features as $slug => $featureId) {
            foreach ($actions as $action) {
                $slugValue = "{$slug}_{$action}";
                $methodId = DB::table('module_feature_action_methods')->insertGetId([
                    'module_feature_id' => $featureId,
                    'action' => $action,
                    'slug' => $slugValue,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
                $methodMap[$slugValue] = $methodId;
            }
        }

        // --- PERMISSIONS ---
        $permissions = [
            ['name' => 'manage_users', 'description' => 'Can create, edit, and delete users', 'method' => 'user_management_manage'],
            ['name' => 'manage_roles', 'description' => 'Can create, edit, and delete roles', 'method' => 'role_management_manage'],
            ['name' => 'manage_permissions', 'description' => 'Can create, edit, and delete permissions', 'method' => 'permission_management_manage'],
            ['name' => 'manage_menus', 'description' => 'Can manage application menus', 'method' => 'menu_management_manage'],
            ['name' => 'view_dashboard', 'description' => 'Can view dashboard page', 'method' => 'developer_mode_view'],
            ['name' => 'access_dev_mode', 'description' => 'Can access developer mode (RBAC management)', 'method' => 'developer_mode_manage'],
        ];

        foreach ($permissions as $p) {
            DB::table('permissions')->insert([
                'name' => $p['name'],
                'description' => $p['description'],
                'module_feature_action_method_id' => $methodMap[$p['method']] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // --- ROLES ---
        $roleId = DB::table('roles')->insertGetId([
            'name' => 'admin',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // --- ROLE-PERMISSION RELATIONS ---
        $permissionIds = DB::table('permissions')->pluck('id');
        foreach ($permissionIds as $pid) {
            DB::table('role_permissions')->insert([
                'role_id' => $roleId,
                'permission_id' => $pid,
            ]);
        }

        // --- USERS ---
        $userId = DB::table('users')->insertGetId([
            'name' => 'Developer',
            'email' => 'dev@labdt.local',
            'password' => bcrypt('password'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // --- USER-ROLE RELATION ---
        DB::table('user_roles')->insert([
            'user_id' => $userId,
            'role_id' => $roleId,
        ]);

        // --- APPLICATION MENUS ---
        DB::table('application_menus')->insert([
            'name' => 'Developer Mode',
            'slug' => 'developer_mode',
            'url' => '/devmode',
            'icon' => 'code',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}

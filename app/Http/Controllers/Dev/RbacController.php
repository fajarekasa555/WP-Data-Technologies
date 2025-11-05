<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Role, Permission, Module, ModuleFeature, ModuleFeatureActionMethod, ApplicationMenu
};

class RbacController extends Controller
{
    public function index()
    {
        $modules = Module::with(['features.actionMethods.permissions'])->get();
        $roles = Role::with('permissions')->get();
        $menus = ApplicationMenu::with('children')->whereNull('parent_id')->orderBy('order')->get();

        return view('dev.rbac', compact('modules', 'roles', 'menus'));
    }

    // 🔹 Generate permissions & menus otomatis
    public function generate()
    {
        // Contoh generate permission dari action method
        $features = ModuleFeature::with('actionMethods')->get();
        foreach ($features as $feature) {
            foreach ($feature->actionMethods as $action) {
                Permission::firstOrCreate([
                    'module_feature_action_method_id' => $action->id,
                    'name' => $feature->slug.'_'.$action->action
                ]);
            }
        }
        return back()->with('success', 'Permissions & Menus generated!');
    }

    // 🔹 CRUD Roles
    public function storeRole(Request $request)
    {
        Role::create($request->only('name', 'description'));
        return response()->json(['success' => true]);
    }

    public function updateRole(Request $request)
    {
        $role = Role::find($request->id);
        $role->update($request->only('name', 'description'));
        return response()->json(['success' => true]);
    }

    public function deleteRole(Request $request)
    {
        $role = Role::find($request->id);
        $role->delete();
        return response()->json(['success' => true]);
    }

    // 🔹 CRUD Menus
    public function storeMenu(Request $request)
    {
        ApplicationMenu::create($request->only('name','parent_id','route','order','module_id'));
        return response()->json(['success' => true]);
    }

    public function updateMenu(Request $request)
    {
        $menu = ApplicationMenu::find($request->id);
        $menu->update($request->only('name','parent_id','route','order','module_id'));
        return response()->json(['success' => true]);
    }

    public function deleteMenu(Request $request)
    {
        $menu = ApplicationMenu::find($request->id);
        $menu->delete();
        return response()->json(['success' => true]);
    }

    // 🔹 AJAX search role/permission
    public function search(Request $request)
    {
        $q = $request->query('q');
        $roles = Role::where('name', 'ilike', "%$q%")->with('permissions')->get();
        return response()->json($roles);
    }
}

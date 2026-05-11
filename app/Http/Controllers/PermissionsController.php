<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::orderBy('id', 'DESC')->paginate(10);

        log_user_activity(0, 'permissions', 'index', 'User accessed the permissions index page', 'admin/permissions');

        return view('admin.permissions.index', compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        log_user_activity(0, 'permissions', 'create', 'User accessed the permissions create page', 'admin/permissions/create');
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
        ]);

        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        log_user_activity($permission->id, 'permissions', 'store', 'User created a new permission: ' . $permission->name, url()->current(), json_encode($permission));

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission created successfully');
    }

    public function edit(Permission $permission)
    {
        log_user_activity($permission->id, 'permissions', 'edit', 'User accessed edit page for permission: ' . $permission->name, 'admin/permissions/' . $permission->id . '/edit', json_encode($permission));
        return view('admin.permissions.edit', compact('permission'));
    }

    public function show(Permission $permission)
    {
        return redirect()->route('admin.permissions.edit', $permission->id);
    }

    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name,' . $permission->id,
        ]);

        $current_object = json_encode($permission);

        $permission->update([
            'name' => $request->name,
        ]);

        log_user_activity($permission->id, 'permissions', 'update', 'User updated permission with id ' . $permission->id, url()->current(), json_encode($permission), $current_object);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission updated successfully');
    }

    public function destroy(Permission $permission)
    {
        $oldPermission = json_encode($permission);
        $permissionId = $permission->id;
        $permission->delete();

        log_user_activity($permissionId, 'permissions', 'destroy', 'User deleted permission with id ' . $permissionId, url()->current(), null, $oldPermission);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission deleted successfully');
    }
}

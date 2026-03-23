<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::orderBy('id', 'DESC')->paginate(10);

        return view('admin.permissions.index', compact('permissions'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:permissions,name',
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission created successfully');
    }

    public function edit(Permission $permission)
    {
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

        $permission->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission updated successfully');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission deleted successfully');
    }
}

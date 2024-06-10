<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{

  public function __construct()
  {
    $this->middleware('permission:view role|create role|update role|delete role', ['only' => ['index']]);
    $this->middleware('permission:create role', ['only' => ['create', 'store']]);
    $this->middleware('permission:update role', ['only' => ['edit', 'update']]);
    $this->middleware('permission:delete role', ['only' => ['destroy']]);
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $roles = Role::latest('id')->get();
    return view('admin.roles_permissions.index', compact('roles'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $permissions = Permission::all();
    return view('admin.roles_permissions.create', compact('permissions'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|string|unique:roles,name'
    ]);

    $role = new Role();
    $role->name = Str::slug($request->name);
    $role->syncPermissions($request->permission);
    $role->save();

    return redirect()->back()->withSuccess('Role create successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $role = Role::findOrFail($id);
    $permissions = Permission::get();
    // $permissionRole = DB::table('role_has_permissions')->where('role_id', $id)->pluck('permission_id')->toArray();
    $permissionRole = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $role->id)
      ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
      ->all();
    return view('admin.roles_permissions.edit', compact('role', 'permissions', 'permissionRole'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $role = Role::findOrFail($id);
    $role->name = Str::slug($request->name);
    $role->update();
    $role->syncPermissions($request->permission);
    return redirect()->back()->withSuccess('Role update successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Role::findOrFail($id)->delete();
    return redirect()->back()->withSuccess('Role delete successfully.');
  }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function __construct()
  {
    $this->middleware('permission:view user|create user|update user|delete user', ['only' => ['index']]);
    $this->middleware('permission:create user', ['only' => ['create', 'store']]);
    $this->middleware('permission:update user', ['only' => ['edit', 'update']]);
    $this->middleware('permission:delete user', ['only' => ['destroy']]);
  }
  

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = User::orderByDesc('last_activity')->get();
    return view('admin.users.index', compact('users'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $roles = Role::pluck('name', 'name')->all();
    return view('admin.users.create', compact('roles'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string',
      'username' => 'required|string|unique:users,username',
      'email' => 'required|email|unique:users,email',
      'role' => 'required',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->slug = Str::slug($user->name);
    $user->username = $request->username;
    $user->email = $request->email;
    $user->role = $request->role;
    $user->password = Hash::make(12345678);
    $user->save();

    $user->syncRoles($request->role);

    return redirect()->back()->withSuccess('User account created successfully.');
  }


  /**
   * Display the specified resource.
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(User $user)
  {
    $roles = Role::pluck('name', 'name')->all();
    return view('admin.users.edit', compact('user', 'roles'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, User $user)
  {
    $request->validate([
      'name' => 'required|string',
      'username' => 'required|string|unique:users,username,' . $user->id,
      'email' => 'required|email|unique:users,email,' . $user->id,
      'role' => 'required',
    ]);

    $user->name = $request->name;
    $user->slug = Str::slug($user->name);
    $user->username = $request->username;
    $user->email = $request->email;
    $user->role = $request->role;
    $user->update();

    $user->syncRoles($request->role);

    return redirect()->back()->withSuccess('User account update successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    //
  }
}

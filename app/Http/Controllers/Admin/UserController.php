<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{

  protected $userRepository;

  public function __construct(UserRepositoryInterface $userRepository)
  {
    $this->middleware('permission:view user|create user|update user|delete user', ['only' => ['index']]);
    $this->middleware('permission:create user', ['only' => ['create', 'store']]);
    $this->middleware('permission:update user', ['only' => ['edit', 'update']]);
    $this->middleware('permission:delete user', ['only' => ['destroy']]);

    $this->userRepository = $userRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $users = $this->userRepository->getAll();
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
  public function store(UserRequest $request)
  {
    $this->userRepository->create($request->validated());
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
  public function update(UserRequest $request, User $user)
  {
    $this->userRepository->update($user->id, $request->validated());
    return redirect()->back()->withSuccess('User account update successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(User $user)
  {
    $this->userRepository->destroy($user->id);
    return redirect()->back()->withSuccess('User account delete successfully.');
  }
}

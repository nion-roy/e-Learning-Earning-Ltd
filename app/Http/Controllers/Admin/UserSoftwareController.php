<?php

namespace App\Http\Controllers\Admin;

use App\Models\UserSoftware;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserSoftwareRequest;
use App\Repositories\Interfaces\UserSoftwareRepositoryInterface;

class UserSoftwareController extends Controller
{
  protected $UserSoftwareRepository;
  public function __construct(UserSoftwareRepositoryInterface $UserSoftwareRepository)
  {
    $this->UserSoftwareRepository = $UserSoftwareRepository;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $softwares = $this->UserSoftwareRepository->getAll();
    return view('admin.user-software.index', compact('softwares'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.user-software.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(UserSoftwareRequest $request)
  {
    $this->UserSoftwareRepository->create($request->validated());
    return redirect()->back()->withSuccess('User software added successfull.');
  }

  /**
   * Display the specified resource.
   */
  public function show(UserSoftware $userSoftware)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(UserSoftware $userSoftware)
  {
    $software = $this->UserSoftwareRepository->getById($userSoftware->id);
    return view('admin.user-software.edit', compact('software'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UserSoftwareRequest $request, UserSoftware $userSoftware)
  {
    $this->UserSoftwareRepository->update($userSoftware->id, $request->validated());
    return redirect()->back()->withSuccess('User software update successfull.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(UserSoftware $userSoftware)
  {
    $this->UserSoftwareRepository->destroy($userSoftware->id);
    return redirect()->back()->withSuccess('User software delete successfull.');
  }
}

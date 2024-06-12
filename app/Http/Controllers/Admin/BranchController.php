<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Repositories\Interfaces\BranchRepositoryInterface;

class BranchController extends Controller
{

  protected $branchRepository;

  public function __construct(BranchRepositoryInterface $branchRepository)
  {
    $this->branchRepository = $branchRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $branches = $this->branchRepository->getAll();
    return view('admin.branch.index', compact('branches'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.branch.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(BranchRequest $request)
  {
    $this->branchRepository->create($request->validated());
    return redirect()->back()->withSuccess('Branch added successfull.');
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
  public function edit(Branch $branch)
  {
    $branch = $this->branchRepository->getById($branch->id);
    return view('admin.branch.edit', compact('branch'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(BranchRequest $request, Branch $branch)
  {
    $this->branchRepository->update($branch->id, $request->validated());
    return redirect()->back()->withSuccess('Branch update successfull.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Branch $branch)
  {
    $this->branchRepository->destroy($branch->id);
    return redirect()->back()->withSuccess('Branch delete successfull.');
  }
}

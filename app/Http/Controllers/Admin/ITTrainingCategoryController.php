<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ITTrainingCategoryRequest;
use App\Repositories\Interfaces\ITTrainingCategoryRepositoryInterface;

class ITTrainingCategoryController extends Controller
{
  protected $ITTrainingCategoryInterface;

  public function __construct(ITTrainingCategoryRepositoryInterface $ITTrainingCategoryInterface)
  {
    $this->ITTrainingCategoryInterface = $ITTrainingCategoryInterface;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $categories = $this->ITTrainingCategoryInterface->getAll();
    return view('admin.it-training.category.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.it-training.category.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ITTrainingCategoryRequest $request)
  {
    $this->ITTrainingCategoryInterface->create($request->validated());
    return redirect()->back()->withSuccess('IT training category added successfull.');
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
    $category = $this->ITTrainingCategoryInterface->getById($id);
    return view('admin.it-training.category.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ITTrainingCategoryRequest $request, string $id)
  {
    $this->ITTrainingCategoryInterface->update($id, $request->validated());
    return redirect()->back()->withSuccess('IT training category update successfull.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->ITTrainingCategoryInterface->destroy($id);
    return redirect()->back()->withSuccess('IT training category delete successfull.');
  }
}

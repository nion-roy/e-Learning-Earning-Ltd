<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\CourseCategoryRequest;
use App\Repositories\Interfaces\CourseCategoryRepositoryInterface;

class CourseCategoryController extends Controller
{

  protected $courseCategoryRepository;

  public function __construct(CourseCategoryRepositoryInterface $courseCategoryRepository)
  {
    $this->courseCategoryRepository = $courseCategoryRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $categories = $this->courseCategoryRepository->getAll();
    return view('admin.course.category.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.course.category.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CourseCategoryRequest $request)
  {
    $this->courseCategoryRepository->create($request->validated());
    return redirect()->back()->withSuccess('Course category added successfull.');
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
    $category = $this->courseCategoryRepository->getById($id);
    return view('admin.course.category.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(CourseCategoryRequest $request, string $id)
  {
    $this->courseCategoryRepository->update($id, $request->validated());
    return redirect()->back()->withSuccess('Course category update successfull.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->courseCategoryRepository->destroy($id);
    return redirect()->back()->withSuccess('Course category delete successfull.');
  }
}

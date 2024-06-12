<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerCategoryRequest;
use App\Repositories\Interfaces\PartnerCategoryRepositoryInterface;

class PartnerCategoryController extends Controller
{

  protected $partnerCategoryRepository;

  public function __construct(PartnerCategoryRepositoryInterface $partnerCategoryRepository)
  {
    $this->partnerCategoryRepository = $partnerCategoryRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $categories =  $this->partnerCategoryRepository->getAll();
    return view('admin.partners.category.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.partners.category.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PartnerCategoryRequest $request)
  {
    $this->partnerCategoryRepository->create($request->validated());
    return redirect()->back()->withSuccess('Partner category added successfull.');
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
    $category = $this->partnerCategoryRepository->getById($id);
    return view('admin.partners.category.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PartnerCategoryRequest $request, string $id)
  {
    $this->partnerCategoryRepository->update($id, $request->validated());
    return redirect()->back()->withSuccess('Partner category update successfull.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->partnerCategoryRepository->destroy($id);
    return redirect()->back()->withSuccess('Partner category delete successfull.');
  }
}

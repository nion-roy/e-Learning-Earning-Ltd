<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ITTrainingRequest;
use App\Models\ITTrainingCategory;
use App\Repositories\Interfaces\ITTrainingRepositoryInterface;
use Illuminate\Http\Request;

class ITTrainingController extends Controller
{

  protected $ITTrainingInterface;
  public function __construct(ITTrainingRepositoryInterface $ITTrainingInterface)
  {
    $this->ITTrainingInterface = $ITTrainingInterface;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $trainings = $this->ITTrainingInterface->getAll();
    return view('admin.it-training.it-training.index', compact('trainings'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = ITTrainingCategory::where('status', true)->get();
    return view('admin.it-training.it-training.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ITTrainingRequest $request)
  {
    $this->ITTrainingInterface->create($request->validated());
    return redirect()->back()->withSuccess('IT training added successfull.');
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
    $categories = ITTrainingCategory::where('status', true)->get();
    $training = $this->ITTrainingInterface->getById($id);
    return view('admin.it-training.it-training.edit', compact('training', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ITTrainingRequest $request, string $id)
  {
    $this->ITTrainingInterface->update($id, $request->validated());
    return redirect()->back()->withSuccess('IT training update successfull.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->ITTrainingInterface->getById($id);
    return redirect()->back()->withSuccess('IT training delete successfull.');
  }
}

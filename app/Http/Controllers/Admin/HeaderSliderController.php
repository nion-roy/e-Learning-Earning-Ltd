<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderSliderRequest;
use App\Repositories\Interfaces\HeaderSliderRepositoryInterface;

class HeaderSliderController extends Controller
{

  protected $headerSliderRepository;

  public function __construct(HeaderSliderRepositoryInterface $headerSliderRepository)
  {
    $this->headerSliderRepository = $headerSliderRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $headerSliders = $this->headerSliderRepository->getAll();
    return view('admin.header-slide.index', compact('headerSliders'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.header-slide.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(HeaderSliderRequest $request)
  {
    $this->headerSliderRepository->create($request->validated());
    return redirect()->back()->withSuccess('Header banner create successfull.');
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
    $headerSlider = $this->headerSliderRepository->getById($id);
    return view('admin.header-slide.edit', compact('headerSlider'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(HeaderSliderRequest $request, string $id)
  {
    $this->headerSliderRepository->update($id, $request->validated());
    return redirect()->back()->withSuccess('Header banner update successfull.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->headerSliderRepository->destroy($id);
    return redirect()->back()->withSuccess('Header banner delete successfull.');
  }
}

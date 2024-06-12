<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Repositories\Interfaces\TestimonialRepositoryInterface;

class TestimonialController extends Controller
{

  protected $testimonialRepository;

  public function __construct(TestimonialRepositoryInterface $testimonialRepository)
  {
    $this->testimonialRepository = $testimonialRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $testimonials = $this->testimonialRepository->getAll();
    return view('admin.testimonial.index', compact('testimonials'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.testimonial.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(TestimonialRequest $request)
  {
    $this->testimonialRepository->create($request->validated());
    return redirect()->back()->withSuccess('Testimonial added successfull.');
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
    $testimonial = $this->testimonialRepository->getById($id);
    return view('admin.testimonial.edit', compact('testimonial'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(TestimonialRequest $request, string $id)
  {
    $this->testimonialRepository->update($id, $request->validated());
    return redirect()->back()->withSuccess('Testimonial update successfull.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->testimonialRepository->destroy($id);
    return redirect()->back()->withSuccess('Testimonial delete successfull.');
  }
}

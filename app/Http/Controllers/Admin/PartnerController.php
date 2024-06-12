<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\PartnerCategory;
use App\Repositories\Interfaces\PartnerRepositoryInterface;

class PartnerController extends Controller
{

  protected $partnerRepository;

  public function __construct(PartnerRepositoryInterface $partnerRepository)
  {
    $this->partnerRepository = $partnerRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $partners = $this->partnerRepository->getAll();
    return view('admin.partners.partner.index', compact('partners'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $categories = PartnerCategory::where('status', true)->get();
    return view('admin.partners.partner.create', compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PartnerRequest $request)
  {
    $this->partnerRepository->create($request->validated());
    return redirect()->back()->withSuccess('Partner added successfull.');
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
    $categories = PartnerCategory::where('status', true)->get();
    $partner = $this->partnerRepository->getById($id);
    return view('admin.partners.partner.edit', compact('partner', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PartnerRequest $request, string $id)
  {
    $this->partnerRepository->update($id, $request->validated());
    return redirect()->back()->withSuccess('Partner update successfull.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->partnerRepository->destroy($id);
    return redirect()->back()->withSuccess('Partner delete successfull.');
  }
}

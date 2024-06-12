<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PopupRequest;
use App\Models\Popup;
use App\Repositories\Interfaces\PopupRepositoryInterface;
use Illuminate\Http\Request;

class PopupController extends Controller
{

  protected $popupRepositroy;

  public function __construct(PopupRepositoryInterface $popupRepositroy)
  {
    $this->popupRepositroy = $popupRepositroy;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $popups = $this->popupRepositroy->getAll();
    return view('admin.popup.index', compact('popups'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.popup.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(PopupRequest $request)
  {
    $this->popupRepositroy->create($request->validated());
    return redirect()->back()->withSuccess('Popup banner create successfull.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Popup $popup)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Popup $popup)
  {
    $popup = $this->popupRepositroy->getById($popup->id);
    return view('admin.popup.edit', compact('popup'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(PopupRequest $request, Popup $popup)
  {
    $this->popupRepositroy->update($popup->id, $request->validated());
    return redirect()->back()->withSuccess('Popup banner update successfull.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Popup $popup)
  {
    $this->popupRepositroy->destroy($popup->id);
    return redirect()->back()->withSuccess('Popup banner delete successfull.');
  }
}

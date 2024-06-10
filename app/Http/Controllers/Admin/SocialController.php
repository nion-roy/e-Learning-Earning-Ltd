<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $socials = Social::latest('id')->get();
    return view('admin.setting.social.index', compact('socials'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Validate the incoming request
    $validatedData = $request->validate([
      'names.*' => 'required|string',
      'icons.*' => 'required|string',
      'urls.*' => 'required|url',
    ], [
      'names.*' => 'The social name filed is empty',
      'icons.*' => 'The social icon filed is empty',
      'urls.*' => 'The social url filed is empty',
      'urls.*.url' => 'URL must be a valid URL format.',
    ]);

    // Truncate the Social table to clear existing data
    Social::truncate();

    foreach ($validatedData['names'] as $index => $name) {
      // Check if the URL already exists in the database
      $existingSocial = Social::where('url', $validatedData['urls'][$index])->first();

      if ($existingSocial) {
        // Handle duplicate URL error
        return redirect()->back()->withErrors(['urls.' . $index => 'The URL ' . $validatedData['urls'][$index] . ' already exists.'])->withInput();
      }

      // Insert the record if the URL is unique
      Social::create([
        'name' => $name,
        'icon' => $validatedData['icons'][$index],
        'url' => $validatedData['urls'][$index],
      ]);
    }

    return redirect()->back()->with('success', 'Social icon update successful.');
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
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}

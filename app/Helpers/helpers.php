<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

// Setting Function
if (!function_exists('getSetting')) {
  function getSetting()
  {
    $settings = App\Models\Setting::first();
    return $settings;
  }
}
// Setting Function


// Partner Category Count Function
if (!function_exists('getPartnerCategoryCount')) {
  function getPartnerCategoryCount($id)
  {
    $partnerCount = App\Models\Partner::where('category_id', $id)->count();
    return $partnerCount;
  }
}
// Partner Category Count Function


// Str Pad Left Function
if (!function_exists('getStrPad')) {
  function getStrPad($value)
  {
    return str_pad($value, 2, '0', STR_PAD_LEFT);
  }
}
// Str Pad Left Function





if (!function_exists('getAuthSlug')) {
  function getAuthSlug()
  {
    if (Auth::check()) {
      $user = App\Models\User::where('id', Auth::id())->select('name')->first();

      if ($user && $user->name) {
        $slug = Str::slug($user->name);
        return (object) ['slug' => $slug];
      }
    }
  }
}

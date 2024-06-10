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

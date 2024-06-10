<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;

class SettingController extends Controller
{
  public function setting()
  {
    $setting = Setting::first();
    return view('admin.setting.index', compact('setting'));
  }

  public function update(SettingRequest $request)
  {
    $formData = $request->validated();
  }
}

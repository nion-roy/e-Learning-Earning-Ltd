<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use RealRashid\SweetAlert\Facades\Alert;

class CacheController extends Controller
{
  public function clearCache()
  {
    // Clear application cache
    Artisan::call('cache:clear');

    // Clear configuration cache
    Artisan::call('config:clear');

    // Clear route cache
    Artisan::call('route:clear');

    // Clear view cache
    Artisan::call('view:clear');

    // Clear event cache
    Artisan::call('event:clear');

    // Clear optimized class loader
    Artisan::call('optimize:clear');

    Alert::success('Success', 'Cache cleared successfully');
    return redirect()->back();
  }
}

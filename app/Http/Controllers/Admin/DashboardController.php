<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function dashboard()
  {
    return view('admin.dashboard');
  }

  public function logout()
  {
    Auth::guard('web')->logout();
    return redirect()->route('login')->with('success', 'Your account logout successfull.');
  }
}

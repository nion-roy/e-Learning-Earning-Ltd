<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
  /**
   * Display the login view.
   */
  public function create(): View
  {
    return view('auth.login');
  }

  /**
   * Handle an incoming authentication request.
   */
  public function store(LoginRequest $request): RedirectResponse
  {
    $request->authenticate();
    $request->session()->regenerate();

    try {
      $credentials = $request->only('email', 'password');
      if (Auth::attempt($credentials, $request->has('remember'))) {
        $user = Auth::user();

        $userRoles = DB::table('model_has_roles')->join('roles', 'model_has_roles.role_id', '=', 'roles.id')->where('model_has_roles.model_id', '=', Auth::id())->first();

        if (!empty($userRoles) && !empty($userRoles->name)) {
          return redirect($userRoles->name . '/dashboard');
        } elseif ($user->status == 2) {
          Auth::logout();
          return redirect()->back()->with(['warning' => 'Your account is pending.'])->withInput($request->only('email'));
        } elseif ($user->status == 3) {
          Auth::logout();
          return redirect()->back()->with(['warning' => 'Your account is suspended.'])->withInput($request->only('email'));
        } elseif ($user->status == 4) {
          Auth::logout();
          return redirect()->back()->with(['error' => 'Your account is blocked.'])->withInput($request->only('email'));
        } else {
          Auth::logout();
          return redirect()->back()->withErrors(['email' => 'These credentials do not match our records'])->withInput($request->only('email'));
        }
      } else {
        return redirect()->back()->withErrors(['email' => 'Invalid email or password'])->withInput($request->only('email'));
      }
    } catch (\Exception $e) {
      return redirect()->back()->withErrors(['email' => 'An error occurred. Please try again later.' . $e])->withInput($request->only('email'));
    }
  }

  /**
   * Destroy an authenticated session.
   */
  public function destroy(Request $request): RedirectResponse
  {
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}

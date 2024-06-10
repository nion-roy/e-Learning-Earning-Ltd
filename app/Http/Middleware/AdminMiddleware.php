<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {

    if (Auth::check()) {
      $userRoles = DB::table('model_has_roles')->join('roles', 'model_has_roles.role_id', '=', 'roles.id')->first();
      if ($userRoles->name == Auth::user()->role && Auth::user()->status == 1) {
        return $next($request);
      } elseif (Auth::user()->status == 5) {
        Auth::logout();
        return redirect()->route('login')->withWarning('Your account is pending.');
      } elseif (Auth::user()->status == 6) {
        Auth::logout();
        return redirect()->route('login')->withWarning('Your account is suspended.');
      } elseif (Auth::user()->status == 7) {
        Auth::logout();
        return redirect()->route('login')->withWarning('Your account is blocked.');
      } else {
        Auth::logout();
        return redirect()->route('login')->withErrors('Your account is unknown. Please contact administrator.');
      }
    } else {
      // abort(404);
      return redirect()->back();
    }
  }
}

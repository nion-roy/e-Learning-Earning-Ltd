<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class UpdateLastActivity
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (Auth::check()) {
      $expiresAt = Carbon::now()->addMinutes(5);
      Cache::put('user-is-online-' . Auth::id(), true, $expiresAt);

      // Also update the database to keep a permanent record
      User::where('id', Auth::id())->update(['last_activity' => Carbon::now()]);
    }

    return $next($request);
  }
}

<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role; 
        switch ($role) {
          case 0:
            return redirect('admin/dashboard');
            break;
          case 1:
            return redirect('kepsek/dashboard');
            break;
          case 2:
            return redirect('guru/dashboard');
            break; 
      
          default:
            return '/login'; 
          break;
        }
        }

        return $next($request);
    }
}

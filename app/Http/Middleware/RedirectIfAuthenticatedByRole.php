<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedByRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
                //auth()->user()->role == 'user' ? return redirect()->route('dashboard') : return redirect()->route('admin_dashboard');
            
              $role = auth()->user()->role; 

              switch ($role) {
                case 'superadmin':
                   return redirect('/admin_dashboard');
                   break;
                case 'user':
                   return redirect('/dashboard');
                   break; 

                default:
                   return redirect('/dashboard'); 
                   break;
              }
            }
          }
        return $next($request);
    }
}

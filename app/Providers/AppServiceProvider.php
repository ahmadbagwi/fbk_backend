<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use Inertia\Inertia;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Inertia::share('flash', function () {
        return [
          'message' => Session::get('status'),
        ];
      });

      Inertia::share('validasi', function () {
        return [
          'message' => Session::get('status'),
        ];
      });

      // Inertia::share('errorBags', function () {
      //   return [
      //     'message' => Session::get('errors'),
      //   ];
      // });

      // Inertia::share('errors', function () {
      //   return Session::get('errors')
      //           ? Session::get('errors')->getBag('default')->getMessages()
      //           : (object) [];
      // });

      // Inertia::share([
      //   'flash' => [
      //     'message' => Session::get('status')
      //   ],

      //   'errors' => [
      //     'message' => Session::get('errors')
      //   ],
      // ]);

      Inertia::share('auth.user', function () {
        if (Auth::user()) {
          return [
            'id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'role' => Auth::user()->role,
            'kegiatan' => Auth::user()->kegiatan
          ];
        }
      });
    }
}

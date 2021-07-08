<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function redirectTo() {
        $role = Auth::user()->role; 
        switch ($role) {
          case 0:
            return route('admin.home');
            break;
          case 1:
            return route('kepsek.home');
            break;
          case 2:
            return route('guru.home');
            break; 
      
          default:
            return '/login'; 
          break;
        }
      }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

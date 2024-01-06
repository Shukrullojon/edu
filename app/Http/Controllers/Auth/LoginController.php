<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function username()
    {
        return 'phone';
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(Request $request)
    {
        $request->merge(
            ['phone' => str_replace(['(', ')', '-'], '', $request->phone)]
        );
        $this->middleware('guest')->except('logout');
    }


}

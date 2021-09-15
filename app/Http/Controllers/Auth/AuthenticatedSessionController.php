<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {   
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);

        $type = \Auth::user()->acc_type;

        if ($type == 1) 
        {
            return redirect('personal/dashboard');
        } 

        if($type == 2)
        {
            return redirect('admin/dashboard');
        } 

        if($type == null || $type == 0) 
        {
            return redirect('login');
        }
    }


    /**
     * Include status as credential.
     *
    */
    protected function credentials(\Illuminate\Http\Request $request) 
    {
         return ["email" => $request->{$this->username()}, "password" => $request->password, "status" => 1];
    }

    
    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Auth logout user.
     *
     */
    public function logout() 
    {
        Auth::logout();
        return redirect('login'); 
    }

    /**
     * Auth show login page
     *
     */
    public function welcome_login() 
    {
        return redirect('login');
    }
}

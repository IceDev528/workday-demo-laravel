<?php
/*
* Workday - A time clock application for employees
* URL: https://codecanyon.net/item/workday-a-time-clock-application-for-employees/23076255
* Support: official.codefactor@gmail.com
* Version: 3.0
* Author: Brian Luna
* Copyright 2021 Codefactor
*/
namespace App\Http\Middleware;

use Closure;
use View;

class CheckStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $s = \Auth::user()->status;
        
        $r = \Auth::user()->role_id;

        if ($s == null || $s == 0) 
        {
            \Auth::logout();
            return redirect()->route('disabled');
        } 
        
        if ($r == null || $r == 0) 
        {
            \Auth::logout();
            return redirect()->route('notfound');
        }
        
        return $next($request);
    }
}

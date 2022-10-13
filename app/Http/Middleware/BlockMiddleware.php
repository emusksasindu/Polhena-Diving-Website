<?php

namespace App\Http\Middleware;

use App\Http\Controllers\HomeController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class BlockMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */


    public function handle(Request $request, Closure $next)
    {
        if ($request->user() == null) {
            return redirect('/login');
        }

        if ($request->user()->status != 'blocked') {
            if ($request->user()->type == 'A') 
            {

                return redirect('/admin');
            }
            else
            {
                return redirect('/home');
            }
        }

        
        return $next($request);
    }
}

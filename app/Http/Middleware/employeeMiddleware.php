<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class employeeMiddleware
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
        if(session()->get('role')=='admin'){
           return $next($request);
       }
        elseif(session()->get('role')=='user'){
             if($request->routeIs('userdashboard')){
                return redirect()->route('userdashboard');
             }else{
            return redirect('login')->with('message','please login admin credentials');
             }
           return $next($request);
        }
        
            return redirect('login')->with('message','please login ');
         
    }
}

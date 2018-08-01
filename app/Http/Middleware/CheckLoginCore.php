<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginCore
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
        // return $next($request);
        if(!session('id')){
            return redirect()->route('core_login');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginMiddleware
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

        if (!auth()->guard('admin')->check()){
            return redirect(route('admin.login'))->withErrors(['errors'=>'请先登录']);
        }




        return $next($request);
    }
}
